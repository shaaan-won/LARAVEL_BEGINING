<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Patient\Patient as PatientPatient;
use App\Models\Payment_Status;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BillingController extends Controller{
	public function index(){
		$billings = Billing::paginate(10);
		return view("pages.erp.billing.index",["billings"=>$billings]);
	}
	public function create(){
		return view ("pages.erp.billing.create",["patients"=>PatientPatient::all(),"appointments"=>Appointment::all(),"payment_statuss"=>PaymentStatus::all()]);
	}
	public function store(Request $request){
		//Billing::create($request->all());
		$billing = new Billing;
		$billing->patient_id=$request->patient_id;
		$billing->appointment_id=$request->appointment_id;
		$billing->total_amount=$request->total_amount;
		$billing->discount=$request->discount;
		$billing->tax=$request->tax;
		$billing->paid_amount=$request->paid_amount;
		$billing->balance_amount=$request->balance_amount;
		$billing->payment_status_id=$request->payment_status_id;
		$billing->payment_mode=$request->payment_mode;
date_default_timezone_set("Asia/Dhaka");
		$billing->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billing->updated_at=date('Y-m-d H:i:s');

		$billing->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$billing = Billing::find($id);
		return view("pages.erp.billing.show",["billing"=>$billing]);
	}
	public function edit(Billing $billing){
		return view("pages.erp.billing.edit",["billing"=>$billing,"patients"=>PatientPatient::all(),"appointments"=>Appointment::all(),"payment_statuss"=>PaymentStatus::all()]);
	}
	public function update(Request $request,Billing $billing){
		//Billing::update($request->all());
		$billing = Billing::find($billing->id);
		$billing->patient_id=$request->patient_id;
		$billing->appointment_id=$request->appointment_id;
		$billing->total_amount=$request->total_amount;
		$billing->discount=$request->discount;
		$billing->tax=$request->tax;
		$billing->paid_amount=$request->paid_amount;
		$billing->balance_amount=$request->balance_amount;
		$billing->payment_status_id=$request->payment_status_id;
		$billing->payment_mode=$request->payment_mode;
date_default_timezone_set("Asia/Dhaka");
		$billing->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billing->updated_at=date('Y-m-d H:i:s');

		$billing->save();

		return redirect()->route("billings.index")->with('success','Updated Successfully.');
	}
	public function destroy(Billing $billing){
		$billing->delete();
		return redirect()->route("billings.index")->with('success', 'Deleted Successfully.');
	}
}
?>
