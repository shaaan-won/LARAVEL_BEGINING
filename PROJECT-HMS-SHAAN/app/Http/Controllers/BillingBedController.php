<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BillingBed;
use App\Models\Billing;
use App\Models\Bed;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BillingBedController extends Controller{
	public function index(){
		$billingbeds = BillingBed::paginate(10);
		return view ("pages.erp.billingbed.index",["billingbeds"=>$billingbeds]);
	}
	public function create(){
		return view("pages.erp.billingbed.create",["billings"=>Billing::all(),"beds"=>Bed::all()]);
	}
	public function store(Request $request){
		//BillingBed::create($request->all());
		$billingbed = new BillingBed;
		$billingbed->billing_id=$request->billing_id;
		$billingbed->bed_id=$request->bed_id;
		$billingbed->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billingbed->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingbed->updated_at=date('Y-m-d H:i:s');

		$billingbed->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$billingbed = BillingBed::find($id);
		return view("pages.erp.billingbed.show",["billingbed"=>$billingbed]);
	}
	public function edit(BillingBed $billingbed){
		return view("pages.erp.billingbed.edit",["billingbed"=>$billingbed,"billings"=>Billing::all(),"beds"=>Bed::all()]);
	}
	public function update(Request $request,BillingBed $billingbed){
		//BillingBed::update($request->all());
		$billingbed = BillingBed::find($billingbed->id);
		$billingbed->billing_id=$request->billing_id;
		$billingbed->bed_id=$request->bed_id;
		$billingbed->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billingbed->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingbed->updated_at=date('Y-m-d H:i:s');

		$billingbed->save();

		return redirect()->route("billingbeds.index")->with('success','Updated Successfully.');
	}
	public function destroy(BillingBed $billingbed){
		$billingbed->delete();
		return redirect()->route("billingbeds.index")->with('success', 'Deleted Successfully.');
	}
}
?>
