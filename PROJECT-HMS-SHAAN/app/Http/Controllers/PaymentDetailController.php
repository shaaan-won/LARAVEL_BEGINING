<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use App\Models\Billing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PaymentDetailController extends Controller{
	public function index(){
		$paymentdetails = PaymentDetail::paginate(10);
		return view("pages.erp.paymentdetail.index",["paymentdetails"=>$paymentdetails]);
	}
	public function create(){
		return view("pages.erp.paymentdetail.create",["billings"=>Billing::all()]);
	}
	public function store(Request $request){
		//PaymentDetail::create($request->all());
		$paymentdetail = new PaymentDetail;
		$paymentdetail->billing_id=$request->billing_id;
		$paymentdetail->amount=$request->amount;
		$paymentdetail->payment_mode=$request->payment_mode;
date_default_timezone_set("Asia/Dhaka");
		$paymentdetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$paymentdetail->updated_at=date('Y-m-d H:i:s');

		$paymentdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$paymentdetail = PaymentDetail::find($id);
		return view("pages.erp.paymentdetail.show",["paymentdetail"=>$paymentdetail]);
	}
	public function edit(PaymentDetail $paymentdetail){
		return view("pages.erp.paymentdetail.edit",["paymentdetail"=>$paymentdetail,"billings"=>Billing::all()]);
	}
	public function update(Request $request,PaymentDetail $paymentdetail){
		//PaymentDetail::update($request->all());
		$paymentdetail = PaymentDetail::find($paymentdetail->id);
		$paymentdetail->billing_id=$request->billing_id;
		$paymentdetail->amount=$request->amount;
		$paymentdetail->payment_mode=$request->payment_mode;
date_default_timezone_set("Asia/Dhaka");
		$paymentdetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$paymentdetail->updated_at=date('Y-m-d H:i:s');

		$paymentdetail->save();

		return redirect()->route("paymentdetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(PaymentDetail $paymentdetail){
		$paymentdetail->delete();
		return redirect()->route("paymentdetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>
