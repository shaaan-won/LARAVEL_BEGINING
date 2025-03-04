<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'API is working!',
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'tH2Rf@example.com',
            'role' => 'admin',
            'status' => 'active'
        ]);
    }
}
