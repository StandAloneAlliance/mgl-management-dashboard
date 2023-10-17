<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\PayloadController as PayloadController;
use App\Http\Controllers\Admin\CourseController as CourseController;
use App\Http\Controllers\Admin\CustomerController as CustomerController;
use App\Http\Controllers\Admin\HTMLScraper as HTMLScraper; 

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
    return view('home');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // se autorizzato e verificato
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // DEFINIZIONE ROTTE RESOURCE PER CUSTOMER CONTROLLER
    Route::resource('customers', CustomerController::class);

    // DEFINIZIONE ROTTA PER L?ASSEGNAZIONE DEI CORSI
    Route::get('/customer/{id}/assign-courses', [CustomerController::class, 'assignCourses'])->name('courses.assign');

    // DEFINIZIONE ROTTA PER LO STORE DELL'ASSEGNAZIONE DEI CORSI
    Route::post('/customer/{id}/assign-courses', [CourseController::class, 'store'])->name('store_courses.assign');
    Route::post('/courses',[CourseController::class, 'submit'])->name('submit.form');
    Route::post('/courses/store',[CourseController::class, 'store'])->name('courses.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
