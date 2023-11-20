<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inicio;
use App\Models\Capitulo;
use App\Models\Favorito;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller{
    public function index(){
        $titulo = "NeoAnimeWorld";
        $clase = "bg-home";
        $lista_anime = Inicio::orderBy('id_anime','asc')->paginate(12);
        return view('welcome', compact('lista_anime'), ['titulo' => $titulo,'clase' => $clase]);

    }

    public function home(){
        $titulo = "NeoAnimeWorld";
        $clase = "bg-home";
        $lista_anime = Inicio::orderBy('id_anime','asc')->paginate(12);
        return view('welcome', compact('lista_anime'), ['titulo' => $titulo,'clase' => $clase]);

    }

    public function login(){
        $titulo = "login";
        $clase = "bg-login";
        return view('/login/login', ['titulo' => $titulo,'clase' => $clase]);
    }

    public function registro(){
        $titulo = "Registro";
        $clase = "bg-registro";
        return view('login.registro', ['titulo' => $titulo,'clase' => $clase]);
    }

    public function info_anime($anime){
        $clase = "bg-home";
        $info_anime = Inicio::where('id_anime', $anime)->first();
        $info_capitulo = Capitulo::where('fk_anime', $anime)->get();
        $titulo = $info_anime->titulo;
        if(isset(Auth::user()->id)){
            $info_favorito = Favorito::where(array('fk_usuario'=> Auth::user()->id,'fk_anime'=> $info_anime->id_anime))->count(); 
            return view('anime.anime', compact('info_anime','info_capitulo'), ['titulo' => $titulo,'clase' => $clase,'fav' => $info_favorito]);       
        }else{
            return view('anime.anime', compact('info_anime','info_capitulo'), ['titulo' => $titulo,'clase' => $clase]);
        }
    }

    public function directorio(){
        $titulo = "Directorio Anime";
        $clase = "bg-home";
        $lista_anime = Inicio::orderBy('id_anime','asc')->paginate(12);
        return view('anime.directorio', compact('lista_anime'), ['titulo' => $titulo,'clase' => $clase]);

    }

}