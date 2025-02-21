<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class UserController extends Controller{
	public function index(){
		$users = User::paginate(10);
		return view("pages.erp.user.index",["users"=>$users]);
	}
	public function index1(){
		$users = User::paginate(10);
		return view("pages.erp.user.index1",["users"=>$users]);
	}
	public function create(){
		return view("pages.erp.user.create",["roles"=>Role::all()]);
	}
	public function store(Request $request){
		//User::create($request->all());
		$user = new User;
		$user->id=$request->id;
		$user->name=$request->name;
		$user->email=$request->email;
		$user->email_verified_at=$request->email_verified_at;
		$user->role_id=$request->role_id;
		$user->phone=$request->phone;
		$user->address=$request->address;
		$user->password=$request->password;
		$user->remember_token=$request->remember_token;
date_default_timezone_set("Asia/Dhaka");
		$user->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$user->updated_at=date('Y-m-d H:i:s');

		$user->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$user = User::find($id);
		return view("pages.erp.user.show",["user"=>$user]);
	}
	public function edit(User $user){
		return view("pages.erp.user.edit",["user"=>$user,"roles"=>Role::all()]);
	}
	public function update(Request $request,User $user){
		//User::update($request->all());
		$user = User::find($user->id);
		$user->id=$request->id;
		$user->name=$request->name;
		$user->email=$request->email;
		$user->email_verified_at=$request->email_verified_at;
		$user->role_id=$request->role_id;
		$user->phone=$request->phone;
		$user->address=$request->address;
		$user->password=$request->password;
		$user->remember_token=$request->remember_token;
date_default_timezone_set("Asia/Dhaka");
		$user->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$user->updated_at=date('Y-m-d H:i:s');

		$user->save();

		return redirect()->route("users.index")->with('success','Updated Successfully.');
	}
	public function destroy(User $user){
		$user->delete();
		return redirect()->route("users.index")->with('success', 'Deleted Successfully.');
	}
}
?>
