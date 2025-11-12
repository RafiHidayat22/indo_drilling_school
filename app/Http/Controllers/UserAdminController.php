<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    /**
     * Display user management page
     */
    public function index()
    {
        $user = current_user();
        $isSuperAdmin = is_super_admin();
        $pageTitle = 'User Management';

        // Get all users with pagination
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        // Stats
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'Active')->count();
        $adminUsers = User::whereIn('role', ['admin', 'superAdmin'])->count();

        return view('users', compact(
            'user',
            'isSuperAdmin',
            'pageTitle',
            'users',
            'totalUsers',
            'activeUsers',
            'adminUsers'
        ));
    }
}
