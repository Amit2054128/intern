<?php

use App\Http\Controllers\Frontendcontroller;
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
    return view('Frontend.Home');
});

// Route::get('/ram',[Frontendcontroller::class,'index'])->name('ram');

Route::prefix('amit')->group(function(){
Route::get('/ram',[Frontendcontroller::class,'index'])->name('ram');
Route::get('/contatc',[Frontendcontroller::class,'contact'])->name('contact');
Route::post('/contact',[Frontendcontroller::class,'post'])->name('post');
Route::get('/contact-list',[Frontendcontroller::class,'contactList'])->name('contact.list');
Route::get('/contact/edit/{id}',[Frontendcontroller::class,'edit'])->name('contact.edit');
Route::post('/contact/edit/{id}',[Frontendcontroller::class,'update'])->name('contact.update');
Route::get('/contact/delete/{id}',[Frontendcontroller::class,'delete'])->name('contact.delete');

Route::get('/about',[Frontendcontroller::class,'about'])->name('about');
// Route::post('/about',[Frontendcontroller::class,'post'])->name('post');
});
