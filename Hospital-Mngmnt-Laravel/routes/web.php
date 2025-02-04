<?php

use App\Http\Controllers\Hospital_List\HospitalListController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Dashboard Routes working 

Route::get('/', function () {
    return view('pages.dashboard.dashboard');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.dashboard');
})->name('dashboard');

Route::get('/database', function () {
    return view('pages.dashboard.db_connection');
})->name('database');

// End of Dashboard Routes

//Hospital list routes and CRUD

Route::get('/hospital_list', [HospitalListController::class, 'index'])->name('hospital_list');

Route::get('/hospital_list/create', [HospitalListController::class, 'create'])->name('hospital_list.create');

// Route::post('/hospital_list', [HospitalListController::class, 'store'])->name('hospital_list.store');

// Route::get('/hospital_list/{id}/edit', [HospitalListController::class, 'edit'])->name('hospital_list.edit');

// Route::put('/hospital_list/{id}', [HospitalListController::class, 'update'])->name('hospital_list.update');

// Route::get('/hospital_list/{id}', [HospitalListController::class, 'show'])->name('hospital_list.show');

// Route::delete('/hospital_list/{id}', [HospitalListController::class, 'destroy'])->name('hospital_list.destroy');

// Route::get('/hospital_list/{id}/delete', [HospitalListController::class, 'destroy'])->name('hospital_list.delete');

// Route::get('/hospital_list/{id}/search', [HospitalListController::class, 'search'])->name('hospital_list.search');


//End of Hospital list routes


