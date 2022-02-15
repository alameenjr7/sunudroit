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
    Route::resource('/banniere',App\Http\Controllers\BannerController::class);
    Route::post('banniere_status',[App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

    //Brand Company section
    Route::resource('/categorie',App\Http\Controllers\CategorieController::class);
    Route::post('categorie_status',[App\Http\Controllers\CategorieController::class, 'categorieStatus'])->name('categorie.status');
    Route::post('categorie/{id}/child',[App\Http\Controllers\CategorieController::class, 'getChildByParentID']);


    //equipe pro section
    Route::resource('/equipe',App\Http\Controllers\EquipeProController::class);
    Route::post('equipe_status',[App\Http\Controllers\EquipeProController::class, 'equipeStatus'])->name('equipe.status');

    //Publication section
    Route::resource('publication',App\Http\Controllers\PublicationController::class);
    Route::post('publication_status',[App\Http\Controllers\PublicationController::class, 'publicationStatus'])->name('publication.status');

    //Setting section
    Route::get('settings',[App\Http\Controllers\SettingsController::class, 'settings'])->name('settings');
    Route::put('settings',[App\Http\Controllers\SettingsController::class, 'settingsUpdate'])->name('settings.update');

    //About section
    Route::get('abouts',[App\Http\Controllers\AboutUsController::class, 'abouts'])->name('abouts');
    Route::put('about_update',[App\Http\Controllers\AboutUsController::class, 'aboutUpdate'])->name('about.update');


    //Consultation section
    Route::resource('consultation',App\Http\Controllers\ConsultationController::class);
    Route::put('consultation_update/{id}',[App\Http\Controllers\ConsultationController::class, 'update'])->name('consultation.updates');


    //Pub Review
    Route::get('commentaires',[App\Http\Controllers\PublicationReviewController::class, 'index'])->name('commentaires.index');
    Route::post('pub-review-status',[App\Http\Controllers\PublicationReviewController::class, 'pubReviewStatus'])->name('pub.review.status');

});
