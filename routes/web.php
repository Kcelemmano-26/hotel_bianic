<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    $directory = public_path('images/chambres/presidentiel');
    $files = File::files($directory);
    
    $direct = public_path('images/chambres/standard');
    $files = File::files($direct);

    $directo = public_path('images/chambres/familliale');
    $files = File::files($direct);

    $images = [];
    $img = [];
    $directo = [];

    foreach ($files as $file) {
        $images[] = 'images/chambres/presidentiel/' . $file->getFilename();
        $img[] = 'images/chambres/standard/' . $file->getFilename();
        $directo[] = 'images/chambres/familliale/' . $file->getFilename();
    }
    return view('welcome', compact('images', 'img', 'directo'));

})->name('home');

Route::get('/chambres', [Controller::class, 'chambre'])->name('chambre');

Route::get('/services', function(){
    return view('service');
})->name('service');


Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');
// Soumettre une réservation
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('submitContact');

Route::get('/gallery', [GalleryController::class, 'gallery']);
Route::get('/gallery', [GalleryController::class, 'galleryImages'])->name('galleryImages');


