<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Medicine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class MedicineController extends Controller{
	public function index(){
		$medicines = Medicine::paginate(10);
		return view ("pages.erp.medicine.index",["medicines"=>$medicines]);
	}
	public function create(){
		return view("pages.erp.medicine.create",[]);
	}
	public function store(Request $request){
		//Medicine::create($request->all());
		$medicine = new Medicine;
		$medicine->name=$request->name;
		$medicine->category=$request->category;
		$medicine->dosage=$request->dosage;
		$medicine->strength=$request->strength;
		$medicine->manufacturer=$request->manufacturer;
		$medicine->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$medicine->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$medicine->updated_at=date('Y-m-d H:i:s');

		$medicine->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$medicine = Medicine::find($id);
		return view("pages.erp.medicine.show",["medicine"=>$medicine]);
	}
	public function edit(Medicine $medicine){
		return view("pages.erp.medicine.edit",["medicine"=>$medicine,]);
	}
	public function update(Request $request,Medicine $medicine){
		//Medicine::update($request->all());
		$medicine = Medicine::find($medicine->id);
		$medicine->name=$request->name;
		$medicine->category=$request->category;
		$medicine->dosage=$request->dosage;
		$medicine->strength=$request->strength;
		$medicine->manufacturer=$request->manufacturer;
		$medicine->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$medicine->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$medicine->updated_at=date('Y-m-d H:i:s');

		$medicine->save();

		return redirect()->route("medicines.index")->with('success','Updated Successfully.');
	}
	public function destroy(Medicine $medicine){
		$medicine->delete();
		return redirect()->route("medicines.index")->with('success', 'Deleted Successfully.');
	}
}
?>
