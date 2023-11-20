<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Inicio;
use App\Models\Capitulo;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class CapituloController extends Controller
{
    public function actualizar_enlace(Request $request,$info_cap){
        if(Auth::user()->rol == 1){
            for($i=0; $i<$request->capitulos; $i++){
                $id = "id_enlace".$i;
                $en = "enlace".$i;
                $vi = "visible".$i;
                Capitulo::where('id_capitulo', $request->$id)->update(array('enlace'=> $request->$en, 'visible'=>$request->$vi == 1 ? 1 : 0));
            }
            return redirect()->route('anime.pre',$info_cap);
        }else{
            return redirect()->route('home');
        }  
    }

    public function cargar_capitulo($anime,$capitulo){
        $clase = "bg-home";
        $info_anime = Inicio::where('id_anime', $anime)->first();
        $info_capitulo = Capitulo::where(array('fk_anime'=> $anime,'numero_cap'=> $capitulo,'visible'=>1))->first();
        if(isset($info_capitulo->numero_cap)){
            $titulo = $info_anime->titulo."-Episodio ".$info_capitulo->numero_cap;
            return view('anime.ver', compact('info_anime','info_capitulo'), ['titulo' => $titulo,'clase' => $clase]);
        }else{
            return redirect()->route('error.cap');
        }
    }


    public function error(){
        return view('componente.error');

    }
}
