<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;

Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/world', function () {
    return 'World';
});
Route::get('/salam', function () {
    return 'Selamat Datang  ';
});
Route::get('/about', function () {
    return 'Muhammad Ariel Saputra<br>2241720034';
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});
Route::get('/articles/{article}', function ($articleId) {
    return 'Halama Artikel dengan ID ' . "{" . $articleId . "}";
});

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

Route::get('/user/profile', function () {
})->name('profile');

// Routing Menggunakan Controller
Route::get('/helloController', [WelcomeController::class, 'hello']);
Route::get('/indexController', [PageController::class, 'index']);
Route::get('/aboutController', [PageController::class, 'about']);
Route::get('/articlesController/{article}', [PageController::class, 'articles']);

// Routing PhotoController
Route::resource('photos', PhotoController::class);

// Membatasi crud PhotoController
Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);

// Routing View
Route::get('/greeting', function () {
    return view('blog.hello', [
        'name' => 'Muhammad Ariel Saputra'
    ]);
});

// Routing View Controller
Route::get('/greeting', [WelcomeController::class, 'greeting']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/