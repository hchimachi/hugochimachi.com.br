<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::post('/blog/comentario', [HomeController::class, 'comentario'])->name('g.comentario');
Route::get('/blog/{cat}/{art}', [HomeController::class, 'artigo'])->name('blog.artigo');
Route::post('/blog/respcomentario', [HomeController::class, 'respcomentario'])->name('g.respcomentario');
Route::get('/delcom/{id}', [ComentarioController::class, 'apagacomentario'])->name('apaga.comentario');
Route::get('/delres/{id}', [ComentarioController::class, 'apagaresposta'])->name('apaga.rescomentario');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/admin', [HomeController::class, 'index'])->name('admin');
    //Route::get('/admin/usuario', [UsuarioController::class, 'index'])->name('cad.usuario');
    Route::get('/admin/usuario/{id?}', [UsuarioController::class, 'index'])->name('cad.usuario');
    Route::get('/admin/artigo', [ArtigoController::class, 'index'])->name('cad.artigo');    
    Route::get('/admin/comentario', [ArtigoController::class, 'comentario'])->name('cad.comentario');
    Route::post('/admin/gravausuario', [UsuarioController::class, 'grava'])->name('g.usuario');    
    Route::post('/admin/gravaartigo', [ArtigoController::class, 'grava'])->name('g.artigo');
    
    
    
});



//Route::get('/admin', function () {
//    DD(Auth::user());
//})->middleware(['auth','verified']);