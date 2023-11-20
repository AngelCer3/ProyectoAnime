<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CapituloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\UsuarioController;
use App\Models\Admin;
use App\Models\Capitulo;

Route::get('/', 'App\Http\Controllers\InicioController@index');

Route::get('/home', [InicioController::class, 'home'])->name('home');

Route::get('/login',[InicioController::class, 'login'])->name('login')->middleware('guest');

Route::get('/registro',[InicioController::class, 'registro'])->name('registro')->middleware('guest');

Route::post('nuevo-usuario',[SesionController::class, 'registro_usuario'])->name('registro.usuario');

Route::get('anime/{anime}',[InicioController::class, 'info_anime'])->name('info.anime');

Route::post('/login',[SesionController::class, 'login'])->name('sesion.login');

Route::get('/logout',[SesionController::class, 'logout'])->name('logout.login');

Route::get('/dashboard',[AdminController::class, 'panel'])->name('panel.admin')->middleware('auth');

Route::get('/anime-dashboard',[AdminController::class, 'crud_anime'])->name('animes.admin')->middleware('auth');

Route::get('editar/{persona}/anime',[AdminController::class, 'precargar_anime'])->name('anime.pre');

Route::put('editar/{info_anime}', [AdminController::class, 'actualizar_anime'])->name('editar.anime')->middleware('auth');

Route::get('anime/{anime}/eliminar',[AdminController::class, 'eliminar_anime'])->name('eliminar.anime');

Route::get('agregar/anime',[AdminController::class, 'vista_anime'])->name('agregar.anime');

Route::post('agregar',[AdminController::class, 'agregar_anime'])->name('insert.anime');

Route::get('anime/{anime}/prev',[AdminController::class, 'prev_anime'])->name('prev.anime')->middleware('auth');

Route::post('cargar-imagen/{anime}',[AdminController::class, 'cargar_img_anime'])->name('img.anime');

Route::post('cargar-perfil/{anime}',[AdminController::class, 'cargar_perfil_anime'])->name('perfil.anime');

Route::put('cargar-enlace/{anime}',[CapituloController::class, 'actualizar_enlace'])->name('enlace.anime');

Route::get('ver/{anime}/cap-{capitulo?}',[CapituloController::class, 'cargar_capitulo'])->name('ver.anime');

Route::get('/usuario-dashboard',[UsuarioController::class, 'crud_usuario'])->name('admin.usuario')->middleware('auth');

Route::get('editar/{usuario}/usuario',[UsuarioController::class, 'precargar_usuario'])->name('usuario.pre')->middleware('auth');

Route::put('editar/usuario/{info_usuario}', [UsuarioController::class, 'actualizar_usuario'])->name('editar.usuario')->middleware('auth');

Route::get('error', [CapituloController::class, 'error'])->name('error.cap')->middleware('auth');

Route::get('favorito/{anime}',[FavoritoController::class, 'agregar_favorito'])->name('insert.favorito');

Route::get('favorito/{anime}/eliminar',[FavoritoController::class, 'eliminar_favorito'])->name('eliminar.favorito');

Route::get('mis-favoritos',[InicioController::class, 'eliminar_favorito'])->name('info.user');

Route::get('/cuenta', [FavoritoController::class, 'mi_cuenta'])->name('cuenta');

Route::get('/editar-info', [UsuarioController::class, 'precargar_mi_info'])->name('editar.cuenta');

Route::put('editar/mi/{info_usuario}', [UsuarioController::class, 'actualizar_mi_info'])->name('editar.miInfo')->middleware('auth');

Route::post('cargar-usuario/{usuario}',[UsuarioController::class, 'cargar_perfil_usuario'])->name('perfil.usuario');

Route::get('/directorio', [InicioController::class, 'directorio'])->name('directorio.anime');