<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

Route::get('about', [App\Http\Controllers\Frontend\IndexController::class, 'about'])->name('about');
Route::get('service', [App\Http\Controllers\Frontend\IndexController::class, 'service'])->name('service');
Route::get('contact', [App\Http\Controllers\Frontend\IndexController::class, 'contact'])->name('contact');
Route::get('blog', [App\Http\Controllers\Frontend\IndexController::class, 'blog'])->name('blog');
Route::get('corporate/law', [App\Http\Controllers\Frontend\IndexController::class, 'corporate'])->name('corporate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
