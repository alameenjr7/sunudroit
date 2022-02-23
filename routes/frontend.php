<?php

use App\Http\Controllers\BotManController;
use App\Models\Publication;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

Route::get('qui-sommes-nous', [App\Http\Controllers\Frontend\IndexController::class, 'about'])->name('about');


Route::get('informations-pratiques', [App\Http\Controllers\Frontend\IndexController::class, 'service'])->name('service');


Route::get('contact', [App\Http\Controllers\Frontend\IndexController::class, 'contact'])->name('contact');
Route::post('contact-submit', [App\Http\Controllers\Frontend\IndexController::class, 'contactSubmit'])->name('contact.submit');

Route::post('consultation-submit', [App\Http\Controllers\ConsultationController::class, 'consultationSubmit'])->name('consultation.submit');

Route::get('categorie-detail/{slug}/',[App\Http\Controllers\Frontend\IndexController::class, 'categorieDetail'])->name('categorie.detail');


//Calcul droit
Route::get('mes-droits', [App\Http\Controllers\Frontend\MesDroitsController::class, 'calcul'])->name('calcul.droit');
Route::post('calcul-submit', [App\Http\Controllers\Frontend\MesDroitsController::class, 'index'])->name('calcul.submit');

//Telecharger pdf
Route::get('documents', [App\Http\Controllers\Frontend\DownloadPDFViewController::class, 'index'])->name('document.pdf');
Route::get('voir-pdf/{slug}/', [App\Http\Controllers\Frontend\DownloadPDFViewController::class, 'showPDF'])->name('voir.pdf');
Route::get('telecharger-pdf/{id}', [App\Http\Controllers\Frontend\DownloadPDFViewController::class, 'downloadPDF'])->name('download.pdf');


//Publication detail
Route::get('publication-detail/{slug}/',[App\Http\Controllers\Frontend\IndexController::class, 'publicationDetail'])->name('publication.detail');
Route::get('publication-detail/{id}/',[App\Http\Controllers\Frontend\IndexController::class, 'publicationDetail1'])->name('publication.detail1');
Route::get('publications', [App\Http\Controllers\Frontend\IndexController::class, 'publication'])->name('publication');
// Publication categorie
Route::get('pub-cat/{slug}/',[App\Http\Controllers\Frontend\IndexController::class, 'publicationCategorie'])->name('publucation.categorie');
// Route::get('publication',[App\Http\Controllers\Frontend\IndexController::class, 'publication'])->name('publication');
Route::post('publication-filter',[App\Http\Controllers\Frontend\IndexController::class, 'publicationFilter'])->name('publication.filter');
//Review
Route::post('publication-review/{slug}/',[App\Http\Controllers\PublicationReviewController::class, 'publicationReview'])->name('publication.review');


Route::get('mesdroits/detail', [App\Http\Controllers\Frontend\IndexController::class, 'corporate'])->name('corporate');

//Mailing list
Route::post('/mailing_list',[App\Http\Controllers\Frontend\IndexController::class, 'mailingListSubmit'])->name('mailing.list.submit');


//Recherche
Route::get('recherche-automatique',[App\Http\Controllers\Frontend\IndexController::class, 'autoSearch'])->name('auto.search');
Route::get('recherche',[App\Http\Controllers\Frontend\IndexController::class, 'search'])->name('search');


Route::get('/botman', [App\Http\Controllers\BotManController::class, 'handle']);
Route::post('/botman', [App\Http\Controllers\BotManController::class, 'handle']);
// Route::match(['get', 'post'], 'botman', [App\Http\Controllers\BotManController::class, 'handle']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
