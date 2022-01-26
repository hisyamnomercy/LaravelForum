<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*
Route::get('/recent', [ThreadController::recent, 'show']);
Route::get('/unread, [ThreadController::unread, 'show']);
Route::get('/manage', [CategoryController::manage, 'show']);

Route::get('/recent', [ThreadController::recent, 'show']);


index, recent, unread, mark as unread, manage catogery, 

catogeries=> create, show, update, delete
threads=> create thread, show thread, thread restore, thread rename, 
post=> create posst, store post, edit post, delete post, restore post 


*/
