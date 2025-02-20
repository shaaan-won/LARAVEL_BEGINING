<?php

use App\Http\Controllers\Doctors\DoctorController;
use App\Http\Controllers\Hospital_List\HospitalListController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return Auth::check() ? view('dashboard') : view('welcome');
    // return view('welcome');
});

// Ensure this route exists
Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure you have a dashboard.blade.php file
})->name('dashboard')->middleware(['auth', 'verified', 'SuperAdminCheck', 'AdminCheck']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'SuperAdminCheck'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Hospital list routes and CRUD

// Route::get('/hospital_list', [HospitalListController::class, 'index'])->name('hospital_list');

// Route::get('/hospital_list/create', [HospitalListController::class, 'create'])->name('hospital_list.create');

// Route::post('/hospital_list', [HospitalListController::class, 'store'])->name('hospital_list.store');

// Route::get('/hospital_list/{id}', [HospitalListController::class, 'show'])->name('hospital_list.show');

// Route::get('/hospital_list/{id}/edit', [HospitalListController::class, 'edit'])->name('hospital_list.edit');

// Route::put('/hospital_list/{id}', [HospitalListController::class, 'update'])->name('hospital_list.update');

// // when using hard delete
// Route::delete('/hospital_list/{id}', [HospitalListController::class, 'destroy'])->name('hospital_list.destroy');

// // when using soft delete
// Route::get('/hospital_list/delete/{id}', [HospitalListController::class, 'delete'])->name('hospital_list.delete');

// // Route::get('/hospital_list/{id}/search', [HospitalListController::class, 'search'])->name('hospital_list.search');

// //End of Hospital list routes


//Hospital list routes and CRUD using rgroup routes
// Route::prefix('hospital_list')->name('hospital_list.')->group(function () {
//     Route::get('/', [HospitalListController::class, 'index'])->name('index');
//     Route::get('/create', [HospitalListController::class, 'create'])->name('create');
//     Route::post('/', [HospitalListController::class, 'store'])->name('store');
//     Route::get('/{id}', [HospitalListController::class, 'show'])->name('show');
//     Route::get('/{id}/edit', [HospitalListController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [HospitalListController::class, 'update'])->name('update');
    
//     // Hard delete
//     Route::delete('/{id}', [HospitalListController::class, 'destroy'])->name('destroy');

//     // Soft delete
//     Route::get('/delete/{id}', [HospitalListController::class, 'delete'])->name('delete');

//     // Search route (if needed)
//     // Route::get('/{id}/search', [HospitalListController::class, 'search'])->name('search');
// })->middleware(['SuperAdminCheck']);

// Apply the middleware here
Route::prefix('hospital_list')
    ->name('hospital_list.')
    ->middleware(['SuperAdminCheck']) // ✅ Middleware applied correctly
    ->group(function () {

        Route::get('/', [HospitalListController::class, 'index'])->name('index');
        Route::get('/create', [HospitalListController::class, 'create'])->name('create');
        Route::post('/', [HospitalListController::class, 'store'])->name('store');
        Route::get('/{id}', [HospitalListController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [HospitalListController::class, 'edit'])->name('edit');
        Route::put('/{id}', [HospitalListController::class, 'update'])->name('update');
        
        // Hard delete
        Route::delete('/{id}', [HospitalListController::class, 'destroy'])->name('destroy');

        // Soft delete
        Route::get('/delete/{id}', [HospitalListController::class, 'delete'])->name('delete');

        // Search route (if needed)
        // Route::get('/{id}/search', [HospitalListController::class, 'search'])->name('search');
    });


//Resource routes for patients

Route::get('/patients/delete/{id}', [PatientController::class, 'delete'])->name('patients.delete');
Route::resource('/patients', PatientController::class);

//End of resource routes


// Resource routes for doctors

Route::get('/doctors/delete/{id}', [DoctorController::class, 'delete'])->name('doctors.delete');
Route::resource('/doctors', DoctorController::class);

//End of resource routes
