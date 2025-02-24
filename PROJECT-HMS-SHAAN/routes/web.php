<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorAvailabilityController;
use App\Http\Controllers\Doctors\DoctorController;
use App\Http\Controllers\Hospital_List\HospitalListController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return Auth::check() ? view('dashboard') : view('welcome');
    // return view('welcome');
});

// Ensure this route exists
Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure dashboard.blade.php exists in resources/views
})->name('dashboard')
  ->middleware(['auth', 'verified']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'SuperAdminCheck'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//End of auth routes

//Error pages

Route::get('/404', function () {
    return view('pages.errors.404');
})->name('404');

Route::get('/400', function () {
    return view('pages.errors.400');
})->name('400');

Route::get('/500', function () {
    return view('pages.errors.500');
})->name('500');

Route::get('/503', function () {
    return view('pages.errors.503');
})->name('503');

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
    ->middleware(['SuperAdminCheck','auth']) // ✅ Middleware applied correctly
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


//End of Hospital list routes

//Users

Route::get('/users&roles', [UserController::class, 'index1'])->name('users.index1')->middleware(['auth']);
Route::resource('/users', UserController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);  

//End of users

//Roles

Route::get('user_roles', [RoleController::class, 'index1'])->name('user_roles.index1')->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/roles', RoleController::class)->middleware(['auth', 'SuperAdminCheck']);

//End of roles

// Others Routes like Status , Payment status

Route::resource('/statuss', StatusController::class)->middleware(['auth', 'SuperAdminCheck']);
Route::resource('/paymentstatuss', PaymentStatusController::class)->middleware(['auth', 'SuperAdminCheck']);

//End of Others Routes

// patients

Route::get('/patients/delete/{id}', [PatientController::class, 'delete'])->name('patients.delete');
Route::resource('/patients', PatientController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

//End of patients

// departments

Route::resource('/departments', DepartmentController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

//End of departments


//  doctors

Route::get('/doctors/delete/{id}', [DoctorController::class, 'delete'])->name('doctors.delete');
Route::resource('/doctors', DoctorController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

Route::resource('doctoravailabilitys', DoctorAvailabilityController::class)->middleware(['auth']);

//End of doctors

// Appointments

Route::get('/appointments/pending', [AppointmentController::class, 'pendingAppointments'])->name('appointments.pending');
Route::put('/appointments/update-status/{id}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
Route::resource('appointments', AppointmentController::class);

//End of Appointments