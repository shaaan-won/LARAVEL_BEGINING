<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BillingConsultation;
use App\Models\Billing;
use App\Models\Consultation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BillingConsultationController extends Controller{
	public function index(){
		$billingconsultations = BillingConsultation::paginate(10);
		return view("pages.erp.billingconsultation.index",["billingconsultations"=>$billingconsultations]);
	}
	public function create(){
		return view("pages.erp.billingconsultation.create",["billings"=>Billing::all(),"consultations"=>Consultation::all()]);
	}
	public function store(Request $request){
		//BillingConsultation::create($request->all());
		$billingconsultation = new BillingConsultation;
		$billingconsultation->billing_id=$request->billing_id;
		$billingconsultation->consultation_id=$request->consultation_id;
		$billingconsultation->consultation_fee=$request->consultation_fee;
date_default_timezone_set("Asia/Dhaka");
		$billingconsultation->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingconsultation->updated_at=date('Y-m-d H:i:s');

		$billingconsultation->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$billingconsultation = BillingConsultation::find($id);
		return view("pages.erp.billingconsultation.show",["billingconsultation"=>$billingconsultation]);
	}
	public function edit(BillingConsultation $billingconsultation){
		return view("pages.erp.billingconsultation.edit",["billingconsultation"=>$billingconsultation,"billings"=>Billing::all(),"consultations"=>Consultation::all()]);
	}
	public function update(Request $request,BillingConsultation $billingconsultation){
		//BillingConsultation::update($request->all());
		$billingconsultation = BillingConsultation::find($billingconsultation->id);
		$billingconsultation->billing_id=$request->billing_id;
		$billingconsultation->consultation_id=$request->consultation_id;
		$billingconsultation->consultation_fee=$request->consultation_fee;
date_default_timezone_set("Asia/Dhaka");
		$billingconsultation->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingconsultation->updated_at=date('Y-m-d H:i:s');

		$billingconsultation->save();

		return redirect()->route("billingconsultations.index")->with('success','Updated Successfully.');
	}
	public function destroy(BillingConsultation $billingconsultation){
		$billingconsultation->delete();
		return redirect()->route("billingconsultations.index")->with('success', 'Deleted Successfully.');
	}
}
?>
