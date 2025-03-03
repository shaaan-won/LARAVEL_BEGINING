<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BillingService;
use App\Models\Billing;
use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BillingServiceController extends Controller{
	public function index(){
		$billingservices = BillingService::paginate(10);
		return view("pages.erp.billingservice.index",["billingservices"=>$billingservices]);
	}
	public function create(){
		return view("pages.erp.billingservice.create",["billings"=>Billing::all(),"services"=>Service::all()]);
	}
	public function store(Request $request){
		//BillingService::create($request->all());
		$billingservice = new BillingService;
		$billingservice->billing_id=$request->billing_id;
		$billingservice->service_id=$request->service_id;
		$billingservice->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billingservice->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingservice->updated_at=date('Y-m-d H:i:s');

		$billingservice->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$billingservice = BillingService::find($id);
		return view("pages.erp.billingservice.show",["billingservice"=>$billingservice]);
	}
	public function edit(BillingService $billingservice){
		return view("pages.erp.billingservice.edit",["billingservice"=>$billingservice,"billings"=>Billing::all(),"services"=>Service::all()]);
	}
	public function update(Request $request,BillingService $billingservice){
		//BillingService::update($request->all());
		$billingservice = BillingService::find($billingservice->id);
		$billingservice->billing_id=$request->billing_id;
		$billingservice->service_id=$request->service_id;
		$billingservice->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billingservice->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billingservice->updated_at=date('Y-m-d H:i:s');

		$billingservice->save();

		return redirect()->route("billingservices.index")->with('success','Updated Successfully.');
	}
	public function destroy(BillingService $billingservice){
		$billingservice->delete();
		return redirect()->route("billingservices.index")->with('success', 'Deleted Successfully.');
	}
}
?>
