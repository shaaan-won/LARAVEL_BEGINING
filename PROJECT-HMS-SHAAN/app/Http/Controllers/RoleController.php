<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class RoleController extends Controller{
	public function index(){
		$roles = Role::get();
		return view("pages.erp.role.index",["roles"=>$roles]);
	}
	public function index1(){
		$roles = Role::paginate(10);
		return view("pages.erp.role.index1",["roles"=>$roles]);
	}
	public function create(){
		return view("pages.erp.role.create",[]);
	}
	public function store(Request $request){
		$request->validate([
			"name" => "required|string|unique:roles,name",
		]);
		//Role::create($request->all());
		$role = new Role;
		$role->name=$request->name;
date_default_timezone_set("Asia/Dhaka");
		$role->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$role->updated_at=date('Y-m-d H:i:s');

		$role->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$role = Role::find($id);
		return view("pages.erp.role.show",["role"=>$role]);
	}
	public function edit(Role $role){
		return view("pages.erp.role.edit",["role"=>$role,]);
	}
	public function update(Request $request,Role $role){
		$request->validate([
			"name" => "required",
		]);
		//Role::update($request->all());
		$role = Role::find($role->id);
		$role->name=$request->name;
date_default_timezone_set("Asia/Dhaka");
		$role->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$role->updated_at=date('Y-m-d H:i:s');

		$role->save();

		return redirect()->route("roles.index")->with('success','Updated Successfully.');
	}
	public function destroy(Role $role){
		$role->delete();
		return redirect()->route("roles.index")->with('success', 'Deleted Successfully.');
	}
}
?>
