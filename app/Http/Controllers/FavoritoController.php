<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Favorito;
use App\Models\Capitulo;
use App\Models\Inicio;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    public function agregar_favorito($id){
        $anime = new Favorito();

        $anime->fk_anime = $id;
        $anime->fk_usuario = Auth::user()->id;

        $anime->save();
        return redirect()->route('info.anime',$id);
    }

    public function eliminar_favorito($anime){
        //$anime->delete();
        //Capitulo::where('fk_anime',$anime)->delete();
        Favorito::where(array('fk_usuario'=> Auth::user()->id,'fk_anime'=> $anime))->delete(); 
        return redirect()->route('info.anime',$anime);
        
    }
    
    public function mi_cuenta(){
        $titulo = "Mi cuenta";
        $clase = "bg-home";
        $lista_anime = Inicio::join('anime_favorito', 'anime_db.id_anime', 'anime_favorito.fk_anime')->where(array('fk_usuario'=> Auth::user()->id))->paginate(8);
        return view('usuario.favorito', compact('lista_anime'), ['titulo' => $titulo,'clase' => $clase]);

    }
}
