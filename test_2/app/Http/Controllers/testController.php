<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function index($id, $name) {
        return view('test1',compact('id','name'));
    }
    
}
