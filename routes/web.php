<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\SiteController;
use App\Http\Controllers\System\ChurchController;
use App\Http\Controllers\System\PeopleController;
use App\Http\Controllers\System\MinisteryController;
use App\Http\Controllers\System\EventController;
use App\Http\Controllers\System\StudentController;
use App\Http\Controllers\System\ScheduleController;
use App\Http\Controllers\System\GalleryController;
use App\Http\Controllers\System\OjtController;

// Route::name('web.')->group(function(){
    Route::get('/',                 [SiteController::class, 'home'])           ->name('home');
    Route::get('/gallery',          [SiteController::class, 'gallery'])        ->name('gallery');
    Route::get('/photos/{id}',      [SiteController::class, 'photos'])         ->name('photos');
    Route::get('/ministeries',      [SiteController::class, 'ministeries'])    ->name('ministeries');
    Route::get('/events',           [SiteController::class, 'events'])         ->name('events');
    Route::get('/event/{id}',       [SiteController::class, 'event'])          ->name('event');
    Route::get('/registration/{id}',[SiteController::class, 'registration'])   ->name('registration');
    Route::get('/eed',              [SiteController::class, 'eed'])            ->name('eed');
    Route::get('/clinic',           [SiteController::class, 'clinic'])         ->name('clinic');
    Route::get('/share-your-faith', [SiteController::class, 'shareyourfaith']) ->name('shareyourfaith');
    Route::get('/kids-ee',          [SiteController::class, 'kidsee'])         ->name('kidsee');
    Route::get('/hopeforkids',      [SiteController::class, 'hopeforkids'])    ->name('hopeforkids');
// });

Route::prefix('system')->name('system.')->middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::prefix('event')->name('event.')->group(function(){
        Route::get('report/{year?}', [EventController::class,'report' ] )->name('report');
        Route::get('index/{year?}', [EventController::class,'index' ] )->name('index');
        Route::get('create',  [EventController::class,'create'  ] )->name('create');
        Route::get('view/{id}',  [EventController::class,'view'  ] )->name('view');
        Route::get('edit/{id}',  [EventController::class,'edit'  ] )->name('edit');
    });
    Route::prefix('student')->name('student.')->group(function(){
        Route::get('index/{id}', [StudentController::class,'index' ] )->name('index');
        Route::get('create/{id}',  [StudentController::class,'create'  ] )->name('create');
    });
    Route::prefix('church')->name('church.')->group(function(){
        Route::get('index', [ChurchController::class,'index' ] )->name('index');
        Route::get('create', [ChurchController::class,'create' ] )->name('create');
        Route::get('view/{id}',  [ChurchController::class,'view'  ] )->name('view');
        Route::get('edit/{id}',  [ChurchController::class,'edit'  ] )->name('edit');
    });
    Route::prefix('people')->name('people.')->group(function(){
        Route::get('index', [PeopleController::class,'index' ] )->name('index');
        Route::get('create', [PeopleController::class,'create' ] )->name('create');
        Route::get('view/{id}',  [PeopleController::class,'view'  ] )->name('view');
        Route::get('edit/{id}',  [PeopleController::class,'edit'  ] )->name('edit');
    });
    Route::prefix('ministery')->name('ministery.')->group(function(){
        Route::get('index', [MinisteryController::class,'index' ] )->name('index');
        Route::get('create', [MinisteryController::class,'create' ] )->name('create');
        Route::get('view/{id}',  [MinisteryController::class,'view'  ] )->name('view');
        Route::get('edit/{id}',  [MinisteryController::class,'edit'  ] )->name('edit');
    });
    Route::prefix('schedule')->name('schedule.')->group(function(){
        Route::get('index/{id}', [ScheduleController::class,'index' ] )->name('index');
    });
    Route::prefix('gallery')->name('gallery.')->group(function(){
        Route::get('index/{id}', [GalleryController::class,'index' ] )->name('index');
    });
    Route::prefix('ojt')->name('ojt.')->group(function(){
        Route::get('index/{id}', [OjtController::class,'index' ] )->name('index');
        Route::get('create/{id}', [OjtController::class,'create' ] )->name('create');
    });
});
