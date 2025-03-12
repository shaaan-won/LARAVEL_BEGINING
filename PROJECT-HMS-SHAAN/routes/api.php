<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\BedAssignmentController;
use App\Http\Controllers\Api\BedController;
use App\Http\Controllers\Api\BillingBedController;
use App\Http\Controllers\Api\BillingConsultationController;
use App\Http\Controllers\Api\BillingController;
use App\Http\Controllers\Api\BillingLabTestController;
use App\Http\Controllers\Api\BillingMedicineController;
use App\Http\Controllers\Api\BillingServiceController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\ConsultationLabTestController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PaymentDetailController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::get('/users1', [UserController::class, 'index1']);


//API Routes 
Route::get('/billings/lastID' , [BillingController::class, 'lastId']);






//Api Resource routes
Route::resource('/users', UserController::class);
Route::resource('/appointments', AppointmentController::class);
Route::resource('/bedassignments', BedAssignmentController::class);
Route::resource('/beds' , BedController::class);
Route::resource('/billingbeds' , BillingBedController::class);
Route::resource('/billingconsultations' , BillingConsultationController::class); 
Route::resource('/billings' , BillingController::class);
Route::resource('/billinglabtests' , BillingLabTestController::class);
Route::resource('/billingmedicines' , BillingMedicineController::class);
Route::resource('/billingservices' , BillingServiceController::class);
Route::resource('/consultations' , ConsultationController::class); 
Route::resource('/consultationlabtests' , ConsultationLabTestController::class); 
Route::resource('/doctors' , DoctorController::class);
Route::resource('/patients' , PatientController::class);
Route::resource('/paymentdetails' , PaymentDetailController::class);
