<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AppointmentTrashed;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class AppointmentTrashedController extends Controller{
	public function index(){
		$appointmenttrasheds = AppointmentTrashed::all();
		return view("pages.erp.appointmenttrashed.index",["appointmenttrasheds"=>$appointmenttrasheds]);
	}
	public function create(){
		return view("pages.erp.appointmenttrashed.create",["status"=>Status::all()]);
	}
	public function store(Request $request){
		//AppointmentTrashed::create($request->all());
		$appointmenttrashed = new AppointmentTrashed;
		$appointmenttrashed->id=$request->id;
		$appointmenttrashed->doctor_id=$request->doctor_id;
		$appointmenttrashed->patient_id=$request->patient_id;
		$appointmenttrashed->appointment_date=$request->appointment_date;
		$appointmenttrashed->appointment_time=$request->appointment_time;
		$appointmenttrashed->status_id=$request->status_id;
date_default_timezone_set("Asia/Dhaka");
		$appointmenttrashed->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$appointmenttrashed->updated_at=date('Y-m-d H:i:s');

		$appointmenttrashed->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$appointmenttrashed = AppointmentTrashed::find($id);
		return view("pages.erp.appointmenttrashed.show",["appointmenttrashed"=>$appointmenttrashed]);
	}
	public function edit(AppointmentTrashed $appointmenttrashed){
		return view("pages.erp.appointmenttrashed.edit",["appointmenttrashed"=>$appointmenttrashed,"status"=>Status::all()]);
	}
	public function update(Request $request,AppointmentTrashed $appointmenttrashed){
		//AppointmentTrashed::update($request->all());
		$appointmenttrashed = AppointmentTrashed::find($appointmenttrashed->id);
		$appointmenttrashed->id=$request->id;
		$appointmenttrashed->doctor_id=$request->doctor_id;
		$appointmenttrashed->patient_id=$request->patient_id;
		$appointmenttrashed->appointment_date=$request->appointment_date;
		$appointmenttrashed->appointment_time=$request->appointment_time;
		$appointmenttrashed->status_id=$request->status_id;
date_default_timezone_set("Asia/Dhaka");
		$appointmenttrashed->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$appointmenttrashed->updated_at=date('Y-m-d H:i:s');

		$appointmenttrashed->save();

		return redirect()->route("appointmenttrasheds.index")->with('success','Updated Successfully.');
	}
	public function destroy(AppointmentTrashed $appointmenttrashed){
		$appointmenttrashed->delete();
		return redirect()->route("appointmenttrasheds.index")->with('success', 'Deleted Successfully.');
	}
}
?>
