<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\Ward;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BedController extends Controller{
	public function index(){
		$beds = Bed::paginate(10);
		return view("pages.erp.bed.index",["beds"=>$beds]);
	}
	public function create(){
		return view("pages.erp.bed.create",["wards"=>Ward::all(),"status"=>Status::all()]);
	}
	public function store(Request $request){
		//Bed::create($request->all());
		$bed = new Bed;
		$bed->bed_number=$request->bed_number;
		$bed->ward_id=$request->ward_id;
		$bed->status_id=$request->status_id;
date_default_timezone_set("Asia/Dhaka");
		$bed->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$bed->updated_at=date('Y-m-d H:i:s');

		$bed->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$bed = Bed::find($id);
		return view("pages.erp.bed.show",["bed"=>$bed]);
	}
	public function edit(Bed $bed){
		return view("pages.erp.bed.edit",["bed"=>$bed,"wards"=>Ward::all(),"status"=>Status::all()]);
	}
	public function update(Request $request,Bed $bed){
		//Bed::update($request->all());
		$bed = Bed::find($bed->id);
		$bed->bed_number=$request->bed_number;
		$bed->ward_id=$request->ward_id;
		$bed->status_id=$request->status_id;
date_default_timezone_set("Asia/Dhaka");
		$bed->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$bed->updated_at=date('Y-m-d H:i:s');

		$bed->save();

		return redirect()->route("beds.index")->with('success','Updated Successfully.');
	}
	public function destroy(Bed $bed){
		$bed->delete();
		return redirect()->route("beds.index")->with('success', 'Deleted Successfully.');
	}
}
?>
