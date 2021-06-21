<?php

use App\Http\Controllers\{
    PostController
};
use Illuminate\Support\Facades\Route;

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

// Adicionando middlewares de duas formas
Route::middleware(['auth'])->group(function(){
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    //Podem ser adicionadas outras rotas
});
//Ou em um caso expecífico, usar o formato abaixo

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(['auth']);

//------------------------

Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

//abaixo o id já será enviado para a controller
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';