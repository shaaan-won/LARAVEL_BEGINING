<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LabTest;
use App\Models\Category;
use App\Models\ConsultationLabTest;
use App\Models\LabTestCategory;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class LabTestController extends Controller
{
	public function index()
	{
		$labtests = LabTest::all();
		return view("pages.erp.labtest.index", ["labtests" => $labtests]);
	}
	public function create()
	{
		return view("pages.erp.labtest.create", ["categories" => LabTestCategory::all(), "status" => Status::all()]);
	}
	public function store(Request $request)
	{
		//LabTest::create($request->all());
		$labtest = new LabTest;
		$labtest->name = $request->name;
		$labtest->description = $request->description;
		$labtest->price = $request->price;
		$labtest->discount_percentage = $request->discount_percentage;
		$labtest->category_id = $request->category_id;
		$labtest->status_id = $request->status_id;
		$labtest->created_by = $request->created_by;
		$labtest->updated_by = $request->updated_by;
		date_default_timezone_set("Asia/Dhaka");
		$labtest->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$labtest->updated_at = date('Y-m-d H:i:s');

		$labtest->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$labtest = LabTest::find($id);
		return view("pages.erp.labtest.show", ["labtest" => $labtest]);
	}
	public function edit(LabTest $labtest)
	{
		return view("pages.erp.labtest.edit", ["labtest" => $labtest, "categories" => LabTestCategory::all(), "status" => Status::all()]);
	}
	public function update(Request $request, LabTest $labtest)
	{
		//LabTest::update($request->all());
		$labtest = LabTest::find($labtest->id);
		$labtest->name = $request->name;
		$labtest->description = $request->description;
		$labtest->price = $request->price;
		$labtest->discount_percentage = $request->discount_percentage;
		$labtest->category_id = $request->category_id;
		$labtest->status_id = $request->status_id;
		$labtest->created_by = $request->created_by;
		$labtest->updated_by = $request->updated_by;
		date_default_timezone_set("Asia/Dhaka");
		$labtest->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$labtest->updated_at = date('Y-m-d H:i:s');

		$labtest->save();

		return redirect()->route("labtests.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(LabTest $labtest)
	{
		$labtest->delete();
		return redirect()->route("labtests.index")->with('success', 'Deleted Successfully.');
	}

	// pending tests and consultations updates results

	// Show pending lab tests
	public function pendingTests()
	{
		$pendingTests = ConsultationLabTest::whereNull('lab_test_result')
			->with('consultation.patient', 'labTest')
			->get();

		return view('pages.erp.labtest.pending', compact('pendingTests'));
	}

	// Update lab test result
	public function updateTestResult(Request $request, $testId)
	{
		$request->validate([
			'lab_test_result' => 'required|string',
		]);

		$labTest = ConsultationLabTest::findOrFail($testId);
		$labTest->update([
			'lab_test_result' => $request->lab_test_result,
		]);

		return redirect()->route('labtests.pending')->with('success', 'Lab test result updated.');
	}
}
