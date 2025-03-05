<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class StatusController extends Controller
{
	public function index()
	{
		$statuss = Status::paginate(20);
		return view("pages.erp.status.index", ["statuss" => $statuss]);
	}
	public function create()
	{
		return view("pages.erp.status.create", []); 
	}
	public function store(Request $request)
	{
		//Status::create($request->all());
		$status = new Status;
		$status->name = $request->name;
		date_default_timezone_set("Asia/Dhaka");
		$status->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$status->updated_at = date('Y-m-d H:i:s');

		$status->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$status = Status::find($id);
		return view("pages.erp.status.show", ["status" => $status]);
	}
	public function edit(Status $statuss)
	{
		return view("pages.erp.status.edit", ["status" => $statuss]);
	}
	// public function update(Request $request,Status $status){
	// 	//Status::update($request->all());
	// 	$status = Status::find($status->id);
	// 	$status->name=$request->name;
	//      date_default_timezone_set("Asia/Dhaka");
	// 	$status->created_at=date('Y-m-d H:i:s');
	//       date_default_timezone_set("Asia/Dhaka");
	// 	$status->updated_at=date('Y-m-d H:i:s');

	// 	$status->save();

	// 	return redirect()->route("statuss.index")->with('success','Updated Successfully.');
	// }
	public function update(Request $request, Status $statuss)
	{
		// print_r($request->all());
		$statuss->name = $request->name;
		$statuss->updated_at = now();
		$statuss->save();

		return redirect()->route('statuss.index')->with('success', 'Updated Successfully.');
	}

	public function destroy(Status $statuss)
	{	
		// print_r($status);
		$statuss->delete();
		return back()->with('success', 'Deleted Successfully.');
	}
}
