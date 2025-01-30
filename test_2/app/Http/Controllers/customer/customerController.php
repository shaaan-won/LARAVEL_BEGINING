<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        $customers = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => '4t2Pb@example.com',
                'phone' => '1234567890'
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'LZo5e@example.com',
                'phone' => '9876543210'
            ],
            [
                'id' => 3,
                'name' => 'John Doe',
                'email' => '4t2Pb@example.com',
                'phone' => '1234567890'
            ]
        ];
        return view('customer.index', compact('customers'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";

        // echo "<pre>";
        // print_r($request->name) . "<br>";
        // print_r($request->email) . "<br>";
        // print_r($request->phone) . "<br>";
        // echo "</pre>";
        return redirect('/customer')->with('success', 'Customer Created Successfully');
    }
}
