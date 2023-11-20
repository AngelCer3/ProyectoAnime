<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Inicio;
use App\Models\Capitulo;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function panel(){
        $titulo = "NeoAnimeWorld| Dashboard";
        $clase = "bg-admin";
        if(Auth::user()->rol == 1){
            return view('admin.dashboard', ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');
        }

    }

    public function crud_anime(){

        if(Auth::user()->rol == 1){
            $titulo = "Listado de anime";
            $clase = "bg-admin";
            $lista_anime = Admin::orderBy('id_anime','asc')->paginate(8);
            return view('admin.anime', compact('lista_anime'), ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');
        }   

    }

    public function precargar_anime($anime){
        if(Auth::user()->rol == 1){
            $clase = "bg-admin";
            $info_anime = Inicio::where('id_anime', $anime)->first();
            $info_capitulo = Capitulo::where('fk_anime', $anime)->paginate(6);
            $titulo = $info_anime->titulo;
            return view('admin.editar_anime', compact('info_anime','info_capitulo'), ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');
        }   
    }

    public function actualizar_anime(Request $request,Admin $info_anime){
        if(Auth::user()->rol == 1){
            $info_anime->titulo = $request->titulo;
            $info_anime->tipo = $request->tipo;
            $info_anime->genero = $request->genero;
            $info_anime->fecha_estreno = $request->fecha_estreno;
            $info_anime->descripcion = $request->descripcion;
            $info_anime->estado = $request->estado;
            $info_anime->capitulos = $request->capitulos;
    
            $info_anime->save();
            $existentes = Capitulo::where('fk_anime', $request->id_anime)->count();
            if($existentes == 0){
                AdminController::agregar_capitulos(1,$request->capitulos,$request->id_anime);
            }/* elseif($existentes > $request->capitulos){
                AdminController::eliminar_capitulos(($existentes+1), $request->capitulos, $request->id_anime);
            } */else{
                AdminController::agregar_capitulos(($existentes+1), $request->capitulos, $request->id_anime);
            }
            return redirect()->route('anime.pre',$info_anime);
        }else{
            return redirect()->route('home');
        }  
    }

    public static function actualizar_capitulos($cantidad,$id){
        for($i=1; $i<=$cantidad; $i++){
            $capitulo = new Capitulo();

            $capitulo->numero_cap = $i;
            $capitulo->fk_anime = $id;

            $capitulo->save();
        }
    }

    public function eliminar_anime(Admin $anime){
        if(Auth::user()->rol == 1){
            $anime->delete();
            Capitulo::where('fk_anime',$anime->id_anime)->delete();
            return redirect()->route('animes.admin');
        }else{
            return redirect()->route('home');
        }  
    }

    public function vista_anime(){
        $titulo = "NeoAnimeWorld | Agregar anime";
        $clase = "bg-admin";
        if(Auth::user()->rol == 1){
            return view('admin.crear_anime', ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');
        }
    }

    public function agregar_anime(Request $request){
        if(Auth::user()->rol == 1){
            request()->validate([
                'titulo' => ['required','string'],
                'genero' => ['required','string'],
                'fecha_estreno' => ['required'],
                'descripcion' => ['required','string'],
                'capitulos' => ['required','int'],
            ]);  

            $anime = new Admin();

            $anime->titulo = $request->titulo;
            $anime->tipo = $request->tipo;
            $anime->genero = $request->genero;
            $anime->fecha_estreno = $request->fecha_estreno;
            $anime->descripcion = $request->descripcion;
            $anime->estado = $request->estado;
            $anime->capitulos = $request->capitulos;

            $anime->save();
            $id = $anime->id_anime;
            AdminController::agregar_capitulos(1,$request->capitulos,$id);
            return redirect()->route('animes.admin');
        }else{
            return redirect()->route('home');
        }
    }

    public static function agregar_capitulos($inicio,$cantidad,$id){
        for($i=$inicio; $i<=$cantidad; $i++){
            $capitulo = new Capitulo();

            $capitulo->numero_cap = $i;
            $capitulo->fk_anime = $id;

            $capitulo->save();
        }
    }

    public function prev_anime($anime){
        if(Auth::user()->rol == 1){
            $clase = "bg-admin";
            $info_anime = Inicio::where('id_anime', $anime)->first();
            $info_capitulo = Capitulo::where('fk_anime', $info_anime->id_anime)->get();
            $titulo = "Prev |" . $info_anime->titulo;
            return view('admin.prev_anime', compact('info_anime','info_capitulo'), ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');;
        }
    }

    public function cargar_img_anime(Request $request, $anime){
        if(Auth::user()->rol == 1){
            request()->validate([
                'portada' => ['required','image','max:2048'],
            ]);  
            if($request->hasFile('portada')){
                $foto =  $request->file('portada');
                $destino = 'images/portada/'.$anime.'/';
                $formato = strtolower(pathinfo($foto->getClientOriginalName(), PATHINFO_EXTENSION));
                $nombre = 'portada.'.$formato;
                $cargarImagen = $request->file('portada')->move($destino, $nombre);
            }
            return redirect()->route('prev.anime', $anime);
        }else{
            return redirect()->route('home');;
        }
    }

    public function cargar_perfil_anime(Request $request, $anime){
        if(Auth::user()->rol == 1){
            request()->validate([
                'perfil' => ['required','image','max:2048'],
            ]);  
            if($request->hasFile('perfil')){
                $foto =  $request->file('perfil');
                $destino = 'images/portada/'.$anime.'/';
                $formato = strtolower(pathinfo($foto->getClientOriginalName(), PATHINFO_EXTENSION));
                $nombre = 'perfil.'.$formato;
                $cargarImagen = $request->file('perfil')->move($destino, $nombre);
                AdminController::recortar_imagen($destino."".$nombre,$request->coordenada);
            }
            return redirect()->route('prev.anime', $anime);
        }else{
            return redirect()->route('home');;
        }
    }

    public static function recortar_imagen($ruta_img,$coordenada){
        $targ_w = 340;
        $targ_h = 539;
        $jpeg_quality = 100;

        //$image = imagecreatefromjpeg($ruta_img);  

        //imagejpeg($image, $ruta_img, 100);

        $medida = explode("m", $coordenada);

        $img_r = imagecreatefromjpeg($ruta_img);
        $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

        imagecopyresampled($dst_r,$img_r,0,0, $medida[1], $medida[2],$targ_w,$targ_h, $medida[3], $medida[4]);

        imagejpeg($dst_r, $ruta_img, $jpeg_quality);
    }
}
