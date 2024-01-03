<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontendcontroller;
use App\Http\Controllers\StaffController;
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

Route::get('/', function () {
    return view('Frontend.Home');
})->middleware('checkAuth');

Route::prefix('amit')->group(function(){
    Route::get('/ram',[Frontendcontroller::class,'index'])->name('ram');
    Route::get('/contatc',[Frontendcontroller::class,'contact'])->name('contact');
    Route::post('/contact',[Frontendcontroller::class,'post'])->name('post');
    Route::get('/contact-list',[Frontendcontroller::class,'contactList'])->name('contact.list');
    Route::get('/contact/edit/{id}',[Frontendcontroller::class,'edit'])->name('contact.edit');
    Route::post('/contact/edit/{id}',[Frontendcontroller::class,'update'])->name('contact.update');
    Route::get('/contact/delete/{id}',[Frontendcontroller::class,'delete'])->name('contact.delete');
    
    Route::get('/about',[Frontendcontroller::class,'about'])->name('about');
    Route::resource('/staff',StaffController::class)->name('any','staff');
    // Route::post('/about',[Frontendcontroller::class,'post'])->name('post');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
