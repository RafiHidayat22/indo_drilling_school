<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(8);
        return view('users', compact('users'));
    }
}