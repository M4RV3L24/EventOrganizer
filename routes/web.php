<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventCategoryController;

Route::get('/', function () {
    return redirect()->route('event.list');
});


Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('/', [EventController::class, 'index'])->name('list');
    Route::get('/admin', [EventController::class, 'admin'])->name('admin');
    Route::get('/detail/{id}', [EventController::class, 'detail'])->name('detail');
    Route::post('/edit', [EventController::class, 'edit'])->name('edit');
    Route::post('/delete', [EventController::class, 'delete'])->name('delete');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::post('/store', [EventController::class, 'store'])->name('store');
    Route::put('/update/{event_id}', [EventController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'organizer', 'as' => 'organizer.'], function () {
    Route::get('/', [OrganizerController::class, 'index'])->name('list');
    Route::get('/detail/{id}', [OrganizerController::class, 'detail'])->name('detail');
    Route::post('/edit', [OrganizerController::class, 'edit'])->name('edit');
    Route::post('/delete', [OrganizerController::class, 'delete'])->name('delete');
    Route::get('/create', [OrganizerController::class, 'create'])->name('create');
    Route::post('/store', [OrganizerController::class, 'store'])->name('store');
    Route::put('/update/{organizer_id}', [OrganizerController::class, 'update'])->name('update');

});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', [EventCategoryController::class, 'index'])->name('list');
    Route::post('/edit', [EventCategoryController::class, 'edit'])->name('edit');
    Route::post('/delete', [EventCategoryController::class, 'delete'])->name('delete');
    Route::get('/create', [EventCategoryController::class, 'create'])->name('create');
    Route::post('/store', [EventCategoryController::class, 'store'])->name('store');
    Route::put('/update/{category_id}', [EventCategoryController::class, 'update'])->name('update');
});