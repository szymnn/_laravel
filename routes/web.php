<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use Illuminate\Support\Facades\Artisan;

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
    $posts=Post::simplepaginate(5);
    return view('welcome',['posts'=>$posts]);
})->name('index.page');


Route::resource('/reg', AuthController::class);

Route::get('/login', [AuthController::class, "loginIndex"])->name("login.page");
Route::post('login', [AuthController::class, "authUser"])->name("login.log");
Route::get('/logout', [AuthController::class, "logout"])->name('index.logout');
Route::get('/register', function () {
    return view('register');
})->name('register.page');

// Route::middleware(['auth.szymon'])->group(function () {
//     Route::get('/user_panel', function () {
//         return view('user');
//     })->name('user.page');
// });
Route::prefix('user')->middleware('auth.szymon')->group(function () {

    Route::get('/user_panel', function () {
        return view('user');
    })->name('user.page');


    //RESOURCE///
    Route::resource('/post', PostsController::class);
});