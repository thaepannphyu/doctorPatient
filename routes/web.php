<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDashBoardController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::post('/doctors/appointment', [DoctorProfileController::class, 'store']);

Route::get('/doctors', [DoctorProfileController::class, 'index']);
Route::get('/doctors/{id}', [DoctorProfileController::class, 'show']);



Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [PatientController::class, "index"]);
    Route::get('users/{user}/assign', [PatientController::class, "assign"]);
    Route::prefix('admins')->group(function ()  {
        Route::get('/', [AdminController::class, "index"]);
    });
    Route::prefix('doctors')->group(function ()  {
        Route::get('/', [DoctorController::class, "index"]);
    });
});


Route::get('/doctor-dashboard',[DoctorDashBoardController::class,"index"])->middleware(['auth', 'verified',"role:doctor"])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
