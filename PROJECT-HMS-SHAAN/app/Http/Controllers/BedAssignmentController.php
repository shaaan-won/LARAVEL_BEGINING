<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BedAssignment;
use App\Models\Bed;
use App\Models\Patient;
use App\Models\Patient\Patient as PatientPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BedAssignmentController extends Controller{
	public function index(){
		$bedassignments = BedAssignment::all();
		return view("pages.erp.bedassignment.index",["bedassignments"=>$bedassignments]);
	}
	public function create(){
		return view("pages.erp.bedassignment.create",["beds"=>Bed::all(),"patients"=>PatientPatient::all()]);
	}
	public function store(Request $request){
		//BedAssignment::create($request->all());
		$bedassignment = new BedAssignment;
		$bedassignment->bed_id=$request->bed_id;
		$bedassignment->patient_id=$request->patient_id;
		$bedassignment->assigned_at=$request->assigned_at;
		$bedassignment->discharged_at=$request->discharged_at;
date_default_timezone_set("Asia/Dhaka");
		$bedassignment->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$bedassignment->updated_at=date('Y-m-d H:i:s');

		$bedassignment->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$bedassignment = BedAssignment::find($id);
		return view ("pages.erp.bedassignment.show",["bedassignment"=>$bedassignment]);
	}
	public function edit(BedAssignment $bedassignment){
		return view("pages.erp.bedassignment.edit",["bedassignment"=>$bedassignment,"beds"=>Bed::all(),"patients"=>PatientPatient::all()]);
	}
	public function update(Request $request,BedAssignment $bedassignment){
		//BedAssignment::update($request->all());
		$bedassignment = BedAssignment::find($bedassignment->id);
		$bedassignment->bed_id=$request->bed_id;
		$bedassignment->patient_id=$request->patient_id;
		$bedassignment->assigned_at=$request->assigned_at;
		$bedassignment->discharged_at=$request->discharged_at;
date_default_timezone_set("Asia/Dhaka");
		$bedassignment->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$bedassignment->updated_at=date('Y-m-d H:i:s');

		$bedassignment->save();

		return redirect()->route("bedassignments.index")->with('success','Updated Successfully.');
	}
	public function destroy(BedAssignment $bedassignment){
		$bedassignment->delete();
		return redirect()->route("bedassignments.index")->with('success', 'Deleted Successfully.');
	}
}
?>
