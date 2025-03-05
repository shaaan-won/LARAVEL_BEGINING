<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PaymentStatusController extends Controller{
	public function index(){
		$paymentstatuss = PaymentStatus::get();
		return view("pages.erp.paymentstatus.index",["paymentstatuss"=>$paymentstatuss]);
	}
	public function create(){
		return view("pages.erp.paymentstatus.create",[]);
	}
	public function store(Request $request){
		//PaymentStatus::create($request->all());
		$paymentstatus = new PaymentStatus;
		$paymentstatus->name=$request->name;
		date_default_timezone_set("Asia/Dhaka");
		$paymentstatus->created_at=date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$paymentstatus->updated_at=date('Y-m-d H:i:s');

		$paymentstatus->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$paymentstatus = PaymentStatus::find($id);
		return view("pages.erp.paymentstatus.show",["paymentstatus"=>$paymentstatus]);
	}
	public function edit(PaymentStatus $paymentstatuss){
		return view("pages.erp.paymentstatus.edit",["paymentstatus"=>$paymentstatuss,]);
	}
	public function update(Request $request,PaymentStatus $paymentstatuss){
		//PaymentStatus::update($request->all());
		$paymentstatuss = PaymentStatus::find($paymentstatuss->id);
		$paymentstatuss->name=$request->name;
		date_default_timezone_set("Asia/Dhaka");
		$paymentstatuss->created_at=date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$paymentstatuss->updated_at=date('Y-m-d H:i:s');

		$paymentstatuss->save();

		return redirect()->route("paymentstatuss.index")->with('success','Updated Successfully.');
	}
	public function destroy(PaymentStatus $paymentstatuss){
		$paymentstatuss->delete();
		return redirect()->route("paymentstatuss.index")->with('success', 'Deleted Successfully.');
	}
}
?>
