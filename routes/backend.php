<?php

use Illuminate\Support\Facades\Route;




//Admin login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout',[\App\Http\Controllers\Auth\Admin\LogoutController::class, 'logout'])->name('admin.logout');
});


// Admin Dashboard
Route::group(['prefix'=>'admin/','middleware'=>'auth'],function(){
    Route::get('/',[App\Http\Controllers\AdminController::class, 'admin'])->name('admin');


    //Banner section
    Route::resource('/banner',App\Http\Controllers\BannerController::class);
    Route::post('banner_status',[App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

    //Brand Company section
    Route::resource('/brand',App\Http\Controllers\BrandCompanyController::class);
    Route::post('brand_status',[App\Http\Controllers\BrandCompanyController::class, 'brandStatus'])->name('brand.status');

    //Brand Company section
    Route::resource('/equipe',App\Http\Controllers\EquipeProController::class);
    Route::post('equipe_status',[App\Http\Controllers\EquipeProController::class, 'equipeStatus'])->name('equipe.status');


    //Setting section
    Route::get('settings',[App\Http\Controllers\SettingsController::class, 'settings'])->name('settings');
    Route::put('settings',[App\Http\Controllers\SettingsController::class, 'settingsUpdate'])->name('settings.update');

    //About section
    Route::get('about',[App\Http\Controllers\AboutUsController::class, 'about'])->name('about');
    Route::put('about_update',[App\Http\Controllers\SettingsController::class, 'aboutUpdate'])->name('about.update');
});
