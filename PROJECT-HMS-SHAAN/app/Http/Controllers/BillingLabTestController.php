<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BillingLabTest;
use App\Models\Billing;
use App\Models\Lab_Test;
use App\Models\LabTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BillingLabTestController extends Controller{
	public function index(){
		$billinglabtests = BillingLabTest::paginate(10);
		return view("pages.erp.billinglabtest.index",["billinglabtests"=>$billinglabtests]);
	}
	public function create(){
		return view("pages.erp.billinglabtest.create",["billings"=>Billing::all(),"lab_tests"=>LabTest::all()]);
	}
	public function store(Request $request){
		//BillingLabTest::create($request->all());
		$billinglabtest = new BillingLabTest;
		$billinglabtest->billing_id=$request->billing_id;
		$billinglabtest->lab_test_id=$request->lab_test_id;
		$billinglabtest->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billinglabtest->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billinglabtest->updated_at=date('Y-m-d H:i:s');

		$billinglabtest->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$billinglabtest = BillingLabTest::find($id);
		return view("pages.erp.billinglabtest.show",["billinglabtest"=>$billinglabtest]);
	}
	public function edit(BillingLabTest $billinglabtest){
		return view("pages.erp.billinglabtest.edit",["billinglabtest"=>$billinglabtest,"billings"=>Billing::all(),"lab_tests"=>LabTest::all()]);
	}
	public function update(Request $request,BillingLabTest $billinglabtest){
		//BillingLabTest::update($request->all());
		$billinglabtest = BillingLabTest::find($billinglabtest->id);
		$billinglabtest->billing_id=$request->billing_id;
		$billinglabtest->lab_test_id=$request->lab_test_id;
		$billinglabtest->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$billinglabtest->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$billinglabtest->updated_at=date('Y-m-d H:i:s');

		$billinglabtest->save();

		return redirect()->route("billinglabtests.index")->with('success','Updated Successfully.');
	}
	public function destroy(BillingLabTest $billinglabtest){
		$billinglabtest->delete();
		return redirect()->route("billinglabtests.index")->with('success', 'Deleted Successfully.');
	}
}
?>
