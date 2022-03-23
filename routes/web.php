<?php

use App\Http\Controllers\User\Auth\UserController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\CategoriesController;
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
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','admin.auth.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','admin.auth.home')->name('home');
        Route::view('/','admin.auth.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','auth.login')->name('login');
          Route::view('/register','auth.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/home','auth.home')->name('home');
        Route::view('/','auth.home')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });

});

Route::view('/register', 'auth.register')->name('register');

/*
// books
Route::get('books', [BooksController::class, 'index']);
Route::get('books/create', [BooksController::class, 'create'])->middleware('admin');
Route::get('books/{id}', [BooksController::class, 'show']);
Route::post('books', [BooksController::class, 'store']);

// publishers
Route::get('publishers', [PublishersController::class, 'index']);
Route::get('publishers/create', [PublishersController::class, 'create'])->middleware('admin');
Route::get('publishers/{id}', [PublishersController::class, 'show']);
Route::post('publishers', [PublishersController::class, 'store']);

// authors
Route::get('authors', [AuthorsController::class, 'index']);
Route::get('authors/create', [AuthorsController::class, 'create'])->middleware('admin');
Route::get('authors/{id}', [AuthorsController::class, 'show']);
Route::post('authors', [AuthorsController::class, 'store']);

// categories
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/create', [CategoriesController::class, 'create'])
    ->where('name', '[A-Za-z]+')
    ->middleware('admin');

Route::get('categories/record={category:id}', [CategoriesController::class, 'show']);
Route::get('categories/{category:id}/edit', [CategoriesController::class, 'edit'])->middleware('admin');
Route::post('categories', [CategoriesController::class, 'store']);
*/

// Admin Section 
Route::middleware('web')->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('publishers', PublishersController::class);
    Route::resource('books', BooksController::class);
});
/* User Section 
Route::middleware('web')->group(function () {
    Route::resource('categories', CategoriesController::class)->except('edit', 'create', 'update');
    Route::resource('authors', AuthorsController::class)->except('edit', 'create', 'update');
    Route::resource('publishers', PublishersController::class)->except('edit', 'create', 'update');
    Route::resource('books', BooksController::class)->except('edit', 'create', 'update');
});
*/