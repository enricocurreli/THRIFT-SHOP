<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

// PublicController 
Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/announcement/search', [AnnouncementController::class, 'searchAnnouncements'])->name('announcement.search');

// Newsletter 
Route::post('/submit', [PublicController::class, 'submitNewsletter'])->name('newsletter');

// AnnouncementController 
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create')->middleware('auth');

Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');

Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');

// CategoryController 
Route::get('category/index/{category}', [CategoryController::class, 'index'])->name('category.index');

// RevisorController
Route::get('revisor/home', [RevisorController::class, 'index'])->name('revisor.home')->middleware('isRevisor');

Route::patch('accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement')->middleware('isRevisor');

Route::patch('rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement')->middleware('isRevisor');

//? Diventa revisore invio mail
Route::post('revisor/become', [RevisorController::class,'becomeRevisor'])->name('revisor.become')->middleware('auth');

//? Accettazione utente che diventa revisore dalla mail
Route::get('make/revisor/{user}', [RevisorController::class,'makeRevisor'])->name('revisor.make');

//? Pagina con storia e lavora con noi
Route::get('revisor/lavora-con-noi', [RevisorController::class, 'workWithUs'])->name('workWithUs');



Route::patch('revisor/revise/{announcement}', [RevisorController::class, 'reviseAnnouncements'])->name('revisor.revise')->middleware('isRevisor');

//language
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');