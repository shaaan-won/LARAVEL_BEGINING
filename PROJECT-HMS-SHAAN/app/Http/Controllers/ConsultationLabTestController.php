<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ConsultationLabTest;
use App\Models\Lab_Test;
use App\Models\LabTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ConsultationLabTestController extends Controller{
	public function index(){
		$consultationlabtests = ConsultationLabTest::all();
		return view("pages.erp.consultationlabtest.index",["consultationlabtests"=>$consultationlabtests]);
	}
	public function create(){
		return view("pages.erp.consultationlabtest.create",["lab_tests"=>LabTest::all()]);
	}
	public function store(Request $request){
		//ConsultationLabTest::create($request->all());
		$consultationlabtest = new ConsultationLabTest;
		$consultationlabtest->consultation_id=$request->consultation_id;
		$consultationlabtest->lab_test_id=$request->lab_test_id;
		$consultationlabtest->lab_test_result=$request->lab_test_result;
		$consultationlabtest->created_by=$request->created_by;
		$consultationlabtest->updated_by=$request->updated_by;
date_default_timezone_set("Asia/Dhaka");
		$consultationlabtest->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$consultationlabtest->updated_at=date('Y-m-d H:i:s');

		$consultationlabtest->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$consultationlabtest = ConsultationLabTest::find($id);
		return view("pages.erp.consultationlabtest.show",["consultationlabtest"=>$consultationlabtest]);
	}
	public function edit(ConsultationLabTest $consultationlabtest){
		return view("pages.erp.consultationlabtest.edit",["consultationlabtest"=>$consultationlabtest,"lab_tests"=>LabTest::all()]);
	}
	public function update(Request $request,ConsultationLabTest $consultationlabtest){
		//ConsultationLabTest::update($request->all());
		$consultationlabtest = ConsultationLabTest::find($consultationlabtest->id);
		$consultationlabtest->consultation_id=$request->consultation_id;
		$consultationlabtest->lab_test_id=$request->lab_test_id;
		$consultationlabtest->lab_test_result=$request->lab_test_result;
		$consultationlabtest->created_by=$request->created_by;
		$consultationlabtest->updated_by=$request->updated_by;
date_default_timezone_set("Asia/Dhaka");
		$consultationlabtest->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$consultationlabtest->updated_at=date('Y-m-d H:i:s');

		$consultationlabtest->save();

		return redirect()->route("consultationlabtests.index")->with('success','Updated Successfully.');
	}
	public function destroy(ConsultationLabTest $consultationlabtest){
		$consultationlabtest->delete();
		return redirect()->route("consultationlabtests.index")->with('success', 'Deleted Successfully.');
	}
}
?>
