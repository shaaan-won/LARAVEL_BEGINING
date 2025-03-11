<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentTrashedController;
use App\Http\Controllers\BedAssignmentController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BillingBedController;
use App\Http\Controllers\BillingConsultationController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BillingLabTestController;
use App\Http\Controllers\BillingMedicineController;
use App\Http\Controllers\BillingServiceController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ConsultationLabTestController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Http\Controllers\DoctorAvailabilityController;
use App\Http\Controllers\Doctors\DoctorController;
use App\Http\Controllers\Hospital_List\HospitalListController;
use App\Http\Controllers\LabTestCategoryController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
use App\Models\BillingMedicine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return Auth::check() ? view ('dashboard') : view('welcome');
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
    return view ('pages.errors.500');
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

Route::get('/doctor/appointments', [DoctorAppointmentController::class, 'index'])->name('doctor.appointments.index')->middleware(['auth']);
Route::put('/doctor/appointments/updatebydoctor/{id}', [DoctorAppointmentController::class, 'updatebydoctor'])->name('doctor.appointments.updatebydoctor')->middleware(['auth']);
Route::put('/doctor/appointments/cancelbydoctor/{id}', [DoctorAppointmentController::class, 'cancelbydoctor'])->name('doctor.appointments.cancelbydoctor')->middleware(['auth']);



//End of doctors

// Appointments

Route::get('/appointments/pending', [AppointmentController::class, 'pendingAppointments'])->name('appointments.pending');
Route::put('/appointments/update-status/{id}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

Route::get('/appointments/cancelled', [AppointmentController::class, 'cancelledAppointments'])->name('appointments.cancelled');
Route::put('/appointments/reschedule/{id}', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule');

Route::get('/appointments/approved', [AppointmentController::class, 'approvedAppointments'])->name('appointments.approved');
Route::get('/appointments/completed', [AppointmentController::class, 'completedAppointments'])->name('appointments.completed');

Route::delete('appointments/trash/{id}', [AppointmentController::class, 'trashedAppointments'])->name('appointments.trashed');

Route::resource('appointments', AppointmentController::class);
Route::resource('appointmenttrasheds', AppointmentTrashedController::class);

//End of Appointments

// Consultations

Route::get('consultations/form/{appointmentId}', [ConsultationController::class, 'showConsultationForm'])->name('consultations.form');
Route::post('consultations/form/store/{appointmentId}', [ConsultationController::class, 'storeConsultation'])->name('consultations.form.store');

// Route::get('/consultations/pending', [ConsultationController::class, 'pendingConsultations'])->name('consultations.pending');
// Route::put('/consultations/update-status/{id}', [ConsultationController::class, 'updateStatus'])->name('consultations.updateStatus');

Route::get('/labtests/pending', [LabTestController::class, 'pendingTests'])->name('lab.tests.pending');
// Route::post('/labtests/result/update/{testId}', [LabTestController::class, 'updateTestResult'])->name('lab.tests.update');
Route::put('labtests/result/update/{testId}', [LabTestController::class, 'updateTestResult'])
    ->name('labtests.update');

Route::get('/doctor/review/{consultationId}', [DoctorController::class, 'reviewTestResults'])->name('doctor.review');
Route::post('/doctor/finalize/{consultationId}', [DoctorController::class, 'finalizeConsultation'])->name('doctor.finalize');

// all resources for consultations  & labtests
Route::resource('consultations', ConsultationController::class);
Route::resource('consultationlabtests', ConsultationLabTestController::class);
Route::resource('labtests', LabTestController::class);
Route::resource('labtestcategorys', LabTestCategoryController::class);

//End of Consultations

//Beds & Wards

Route::resource('/wards', WardController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/beds', BedController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/bedassignments', BedAssignmentController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

//End of Beds & Wards

// Services

Route::resource('/services', ServiceController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

//End of Services

// Medicines

Route::resource('/medicines', MedicineController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

//End of Medicines

//Billings & Payments

Route::resource('/billings', BillingController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/paymentdetails', PaymentDetailController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

Route::resource('/billingmedicines', BillingMedicineController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/billingservices', BillingServiceController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/billinglabtests', BillingLabTestController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/billingconsultations', BillingConsultationController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);
Route::resource('/billingbeds', BillingBedController::class)->middleware(['auth', 'AdminOrSuperAdminCheck']);

//End of Billings & Payments

// Invoices 

Route::get('/invoices',[BillingController::class, 'invoice'])->middleware(['auth', 'AdminOrSuperAdminCheck']);


//End of Invoices