<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsuarioController as ControllersUsuarioController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function crud_usuario(){

        if(Auth::user()->rol == 1){
            $titulo = "Listado de usuarios";
            $clase = "bg-admin";
            $lista_usuario = User::orderBy('id','asc')->paginate(8);
            return view('admin.usuarios', compact('lista_usuario'), ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');
        }   

    }
    
    public function precargar_usuario($usuario){
        if(Auth::user()->rol == 1){
            $clase = "bg-home";
            $info_usuario = User::where('id', $usuario)->first();
            $titulo = "Informacion de usuario";
            return view('admin.editar_usuario', compact('info_usuario'), ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('home');
        }   
    }

    public function actualizar_usuario(Request $request,User $info_usuario){
        if(Auth::user()->rol == 1){
            $info_usuario->usuario = $request->usuario;
            $info_usuario->email = $request->email;
            $info_usuario->sexo = $request->sexo;
            $info_usuario->rol = empty($request->rol) ? 3 : $request->rol;
    
            $info_usuario->save();
            return redirect()->route('usuario.pre',$info_usuario);
        }else{
            return redirect()->route('home');
        }  
    }

    public function precargar_mi_info(){
        $clase = "bg-home";
        $info_usuario = User::where('id', Auth::user()->id)->first();
        $titulo = "Mi Informacion";
        return view('usuario.perfil', compact('info_usuario'), ['titulo' => $titulo,'clase' => $clase]);
           
    }

    public function actualizar_mi_info(Request $request,User $info_usuario){
        request()->validate([
            "usuario"=> 'required',
            "email"=> 'required',
            "password" => 'required|min:8|max:15',
            "sexo" => 'required',
        ]);
        $info_usuario->usuario = $request->usuario;
        $info_usuario->email = $request->email;
        $info_usuario->password = Hash::make($request->password);
        $info_usuario->sexo = $request->sexo;

        $info_usuario->save();
        return redirect()->route('editar.cuenta'); 
    }

    public function cargar_perfil_usuario(Request $request){
        //if(Auth::user()->rol == 1){
            request()->validate([
                'usuario' => ['required','image','max:2048'],
            ]);  
            if($request->hasFile('usuario')){
                $foto =  $request->file('usuario');
                $destino = 'images/usuario/'.Auth::user()->id.'/';
                $formato = strtolower(pathinfo($foto->getClientOriginalName(), PATHINFO_EXTENSION));
                $nombre = 'usuario.'.$formato;
                $cargarImagen = $request->file('usuario')->move($destino, $nombre);
                UsuarioController::recortar_imagen($destino."".$nombre,$request->coordenada);
            }
            return redirect()->route('editar.cuenta');
        /* }else{
            return redirect()->route('home');;
        } */
    }

    public static function recortar_imagen($ruta_img,$coordenada){
        $targ_w = 400;
        $targ_h = 400;
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
