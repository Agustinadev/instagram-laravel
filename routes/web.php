<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\SearchController;
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

Route::get('/', function () {
    return view('index');
})->name('index');



Route::group( ['middleware' => 'auth'] , function(){


    //Route::view('profile', 'profile')->name('profile');
    Route::put('config', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('config', [ProfileController::class, 'config'])->name('profile');

    //PARA  CREAR LAS IMÁGENES
    Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
    Route::post('images/store', [ImageController::class, 'store'])->name('images.store');
    Route::get('images/delete/{image_id}', [ImageController::class, 'delete'])->name('images.delete');

    //COMENTARIOS
    Route::post('comments', [CommentController::class, 'saveComment'])->name('comments.save');
    //ELIMINAR COMENTARIOS
    Route::post('removecomments', [CommentController::class, 'removeComment'])->name('comments.remove');

    //LIKES
    Route::get('like/{image_id}', [LikeController::class, 'like'])->name('like');
    //ELIMINAR LIKES
    Route::get('remove/{image_id}', [LikeController::class, 'remove'])->name('like.remove');


    //MIS IMÁGENES Y LAS DE LOS OTROS USUARIOS
     Route::get('nick/{nick}', [ProfileController::class, 'index'])->name("profile.user");


    //FOLLOW
    Route::get('follow/{follow_id}', [FollowController::class, 'follow'])->name('follow');
    //UNFOLLOW
    Route::get('unfollow/{follow_id}', [FollowController::class, 'unfollow'])->name('unfollow');


    //SAVE PUBLICATION
    Route::get('save/{image_id}', [SaveController::class, 'save'])->name('save');
    //REMOVE "SAVE PUBLICATION"
    Route::get('removesave/{image_id}', [SaveController::class, 'removeSave'])->name('save.remove');


    //BUSCAR GENTE
    Route::get('search/{nick}', [SearchController::class, 'search'])->name('search');
});

require __DIR__.'/auth.php';
