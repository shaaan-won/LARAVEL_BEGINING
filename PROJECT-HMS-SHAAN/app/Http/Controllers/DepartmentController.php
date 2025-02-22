<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class DepartmentController extends Controller{
	public function index(){
		$departments = Department::all();
		return view("pages.erp.department.index",["departments"=>$departments]);
	}
	public function create(){
		return view("pages.erp.department.create",[]);
	}
	public function store(Request $request){
		//Department::create($request->all());
		$department = new Department;
		$department->name=$request->name;
		$department->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$department->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$department->updated_at=date('Y-m-d H:i:s');

		$department->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$department = Department::find($id);
		return view("pages.erp.department.show",["department"=>$department]);
	}
	public function edit(Department $department){
		return view("pages.erp.department.edit",["department"=>$department,]);
	}
	public function update(Request $request,Department $department){
		//Department::update($request->all());
		$department = Department::find($department->id);
		$department->name=$request->name;
		$department->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$department->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$department->updated_at=date('Y-m-d H:i:s');

		$department->save();

		return redirect()->route("departments.index")->with('success','Updated Successfully.');
	}
	public function destroy(Department $department){
		$department->delete();
		return redirect()->route("departments.index")->with('success', 'Deleted Successfully.');
	}
}
?>
