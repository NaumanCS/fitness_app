<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $obj = User::where('role', '!=', 'admin')->get();
        return view('pages.user.index', compact('obj'));
    }
}
