<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BillingMedicine;
use App\Models\Billing;
use App\Models\Medicine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BillingMedicineController extends Controller{
	public function index(){
		$billingmedicines = BillingMedicine::paginate(10);
		return view("pages.erp.billingmedicine.index",["billingmedicines"=>$billingmedicines]);
	}
	public function create(){
		return view("pages.erp.billingmedicine.create",["billings"=>Billing::all(),"medicines"=>Medicine::all()]);
	}
	public function store(Request $request){
		//BillingMedicine::create($request->all());
		$billingmedicine = new BillingMedicine;
		$billingmedicine->billing_id=$request->billing_id;
		$billingmedicine->medicine_id=$request->medicine_id;
		$billingmedicine->quantity=$request->quantity;
		$billingmedicine->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billingmedicine->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingmedicine->updated_at=date('Y-m-d H:i:s');

		$billingmedicine->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$billingmedicine = BillingMedicine::find($id);
		return view("pages.erp.billingmedicine.show",["billingmedicine"=>$billingmedicine]);
	}
	public function edit(BillingMedicine $billingmedicine){
		return view("pages.erp.billingmedicine.edit",["billingmedicine"=>$billingmedicine,"billings"=>Billing::all(),"medicines"=>Medicine::all()]);
	}
	public function update(Request $request,BillingMedicine $billingmedicine){
		//BillingMedicine::update($request->all());
		$billingmedicine = BillingMedicine::find($billingmedicine->id);
		$billingmedicine->billing_id=$request->billing_id;
		$billingmedicine->medicine_id=$request->medicine_id;
		$billingmedicine->quantity=$request->quantity;
		$billingmedicine->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billingmedicine->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingmedicine->updated_at=date('Y-m-d H:i:s');

		$billingmedicine->save();

		return redirect()->route("billingmedicines.index")->with('success','Updated Successfully.');
	}
	public function destroy(BillingMedicine $billingmedicine){
		$billingmedicine->delete();
		return redirect()->route("billingmedicines.index")->with('success', 'Deleted Successfully.');
	}
}
?>
