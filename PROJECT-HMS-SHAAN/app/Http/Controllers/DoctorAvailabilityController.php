<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\DoctorAvailability;
use App\Models\Doctor;
use App\Models\Doctors\Doctor as DoctorsDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class DoctorAvailabilityController extends Controller{
	public function index(){
		$doctoravailabilitys = DoctorAvailability::all();
		return view("pages.erp.doctoravailability.index",["doctoravailabilitys"=>$doctoravailabilitys]);
	}
	public function create(){
		return view("pages.erp.doctoravailability.create",["doctors"=>DoctorsDoctor::all()]);
	}
	public function store(Request $request){
		$request->validate([
			'doctor_id' => 'required',
			'day' => 'required|array',
			'start_time' => 'required',
			'end_time' => 'required',
		]);
		//DoctorAvailability::create($request->all());
		$doctoravailability = new DoctorAvailability;
		$doctoravailability->doctor_id=$request->doctor_id;
		// $doctoravailability->day=$request->day;
		$doctoravailability->day = json_encode($request->day); // Store as JSON
		$doctoravailability->start_time=$request->start_time;
		$doctoravailability->end_time=$request->end_time;
date_default_timezone_set("Asia/Dhaka");
		$doctoravailability->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$doctoravailability->updated_at=date('Y-m-d H:i:s');

		$doctoravailability->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$doctoravailability = DoctorAvailability::find($id);
		return view("pages.erp.doctoravailability.show",["doctoravailability"=>$doctoravailability]);
	}
	public function edit(DoctorAvailability $doctoravailability){
		return view("pages.erp.doctoravailability.edit",["doctoravailability"=>$doctoravailability,"doctors"=>DoctorsDoctor::all()]);
	}
	public function update(Request $request,DoctorAvailability $doctoravailability){
		//DoctorAvailability::update($request->all());
		$doctoravailability = DoctorAvailability::find($doctoravailability->id);
		$doctoravailability->doctor_id=$request->doctor_id;
		$doctoravailability->day=$request->day;
		$doctoravailability->start_time=$request->start_time;
		$doctoravailability->end_time=$request->end_time;
date_default_timezone_set("Asia/Dhaka");
		$doctoravailability->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$doctoravailability->updated_at=date('Y-m-d H:i:s');

		$doctoravailability->save();

		return redirect()->route("doctoravailabilitys.index")->with('success','Updated Successfully.');
	}
	public function destroy(DoctorAvailability $doctoravailability){
		$doctoravailability->delete();
		return redirect()->route("doctoravailabilitys.index")->with('success', 'Deleted Successfully.');
	}
	
}
?>
