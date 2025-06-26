<?php

use App\Http\Controllers\Frontend\Contact\ContactController;
use App\Http\Controllers\Frontend\Event\EventController;
use App\Http\Controllers\Frontend\Gallery\GalleryController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\About\AboutController;
use App\Http\Controllers\Frontend\Restaurant\RestauController;
use App\Http\Controllers\Frontend\Room\RoomController;
use App\Http\Controllers\Frontend\Service\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index-controller');

Route::get('/about', [AboutController::class, 'index'])->name('about.controller');

Route::get('/room', [RoomController::class, 'index'])->name('room.controller');

Route::get('/restaurant', [RestauController::class, 'index'])->name('restaurant.controller');

Route::get('/service', [ServiceController::class, 'index'])->name('service.controller');

Route::get('/event', [EventController::class, 'index'])->name('event.controller');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.controller');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.controller');

Route::get('/detail_room/{id}', [RoomController::class, 'getSlideRoom'])->name('detailsRoom.controller');

Route::post('/detail-event', [EventController::class, 'getNew'])->name('detail.event');