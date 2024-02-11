<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ConferenceRegistrationController;
use App\Http\Controllers\RegisteredUsersController;
use App\Http\Controllers\ExpiredConferenceController;

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
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('conferences', ConferenceController::class); // <- Note the route name
    Route::view('/test', 'conference');
    Route::get('conferences/{id}/register', [ConferenceController::class, 'showRegistrationForm'])->name('conferences.registerForm');
    Route::post('conferences/{id}/register', [ConferenceRegistrationController::class, 'register'])->name('conferences.register');
    Route::get('conferences/{id}/review', [ConferenceRegistrationController::class, 'review'])->name('conferences.review');
    Route::delete('conferences/unregister/{registration}', [ConferenceRegistrationController::class, 'unregister'])->name('conferences.unregister');
    Route::get('/registered_users', [RegisteredUsersController::class, 'index'])->name('registered_users');
    // Route for expired conferences
    Route::get('/expired-conferences', function () {
        return view('expired-conferences');
    })->name('expired.index');
    Route::get('/expired-conferences', [ExpiredConferenceController::class, 'showExpiredConferences'])->name('expired.index');

});

require __DIR__.'/auth.php';
