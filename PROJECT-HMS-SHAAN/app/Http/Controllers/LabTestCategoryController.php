<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LabTestCategory;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class LabTestCategoryController extends Controller{
	public function index(){
		$labtestcategorys = LabTestCategory::all();
		return view("pages.erp.labtestcategory.index",["labtestcategorys"=>$labtestcategorys]);
	}
	public function create(){
		return view("pages.erp.labtestcategory.create",["status"=>Status::all()]);
	}
	public function store(Request $request){
		//LabTestCategory::create($request->all());
		$labtestcategory = new LabTestCategory;
		$labtestcategory->name=$request->name;
		$labtestcategory->description=$request->description;
		$labtestcategory->status_id=$request->status_id;
date_default_timezone_set("Asia/Dhaka");
		$labtestcategory->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$labtestcategory->updated_at=date('Y-m-d H:i:s');

		$labtestcategory->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$labtestcategory = LabTestCategory::find($id);
		return view("pages.erp.labtestcategory.show",["labtestcategory"=>$labtestcategory]);
	}
	public function edit(LabTestCategory $labtestcategory){
		return view("pages.erp.labtestcategory.edit",["labtestcategory"=>$labtestcategory,"status"=>Status::all()]);
	}
	public function update(Request $request,LabTestCategory $labtestcategory){
		//LabTestCategory::update($request->all());
		$labtestcategory = LabTestCategory::find($labtestcategory->id);
		$labtestcategory->name=$request->name;
		$labtestcategory->description=$request->description;
		$labtestcategory->status_id=$request->status_id;
date_default_timezone_set("Asia/Dhaka");
		$labtestcategory->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$labtestcategory->updated_at=date('Y-m-d H:i:s');

		$labtestcategory->save();

		return redirect()->route("labtestcategorys.index")->with('success','Updated Successfully.');
	}
	public function destroy(LabTestCategory $labtestcategory){
		$labtestcategory->delete();
		return redirect()->route("labtestcategorys.index")->with('success', 'Deleted Successfully.');
	}
}
?>
