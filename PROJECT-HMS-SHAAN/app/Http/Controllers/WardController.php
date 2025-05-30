<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Ward;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Js;

class WardController extends Controller{
	public function index(){
		$wards = Ward::all();
		// return response()->json($wards);
		return view("pages.erp.ward.index",["wards"=>$wards]);
	}
	public function create(){
		return view("pages.erp.ward.create",[]);
	}
	public function store(Request $request){
		//Ward::create($request->all());
		$ward = new Ward;
		$ward->name=$request->name;
		$ward->type=$request->type;
date_default_timezone_set("Asia/Dhaka");
		$ward->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$ward->updated_at=date('Y-m-d H:i:s');

		$ward->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$ward = Ward::find($id);
		return view("pages.erp.ward.show",["ward"=>$ward]);
	}
	public function edit(Ward $ward){
		return view("pages.erp.ward.edit",["ward"=>$ward,]);
	}
	public function update(Request $request,Ward $ward){
		//Ward::update($request->all());
		$ward = Ward::find($ward->id);
		$ward->name=$request->name;
		$ward->type=$request->type;
date_default_timezone_set("Asia/Dhaka");
		$ward->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$ward->updated_at=date('Y-m-d H:i:s');

		$ward->save();

		return redirect()->route("wards.index")->with('success','Updated Successfully.');
	}
	public function destroy(Ward $ward){
		$ward->delete();
		return redirect()->route("wards.index")->with('success', 'Deleted Successfully.');
	}
}
?>
