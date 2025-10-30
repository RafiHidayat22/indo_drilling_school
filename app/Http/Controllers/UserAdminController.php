<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UserAdminController extends Controller
{
    public function index(Request $request)
    {
        // === DATA DUMMY: 10 USER ===
        $dummyUsers = [
            ['username' => 'admin', 'email' => 'admin@example.com', 'role' => 'Super Admin', 'status' => 'Active', 'created_at' => '2024-01-20'],
            ['username' => 'johndoe', 'email' => 'john.doe@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2024-01-22'],
            ['username' => 'janesmith', 'email' => 'jane.smith@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2024-01-25'],
            ['username' => 'robertjohnson', 'email' => 'robert.j@example.com', 'role' => 'User', 'status' => 'Active', 'created_at' => '2024-01-28'],
            ['username' => 'emilywilson', 'email' => 'emily.w@example.com', 'role' => 'User', 'status' => 'Inactive', 'created_at' => '2024-02-01'],
            ['username' => 'michaelbrown', 'email' => 'michael.b@example.com', 'role' => 'User', 'status' => 'Active', 'created_at' => '2024-02-05'],
            ['username' => 'sarahdavis', 'email' => 'sarah.d@example.com', 'role' => 'User', 'status' => 'Active', 'created_at' => '2024-02-10'],
            ['username' => 'davidmiller', 'email' => 'david.m@example.com', 'role' => 'User', 'status' => 'Inactive', 'created_at' => '2024-02-15'],
            ['username' => 'lisawilson', 'email' => 'lisa.w@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2024-02-18'],
            ['username' => 'tomharris', 'email' => 'tom.h@example.com', 'role' => 'User', 'status' => 'Active', 'created_at' => '2024-02-22'],
        ];

        // Pagination manual (agar berfungsi sebelum database siap)
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 8;
        $currentItems = array_slice($dummyUsers, ($currentPage - 1) * $perPage, $perPage);
        $users = new LengthAwarePaginator(
            $currentItems,
            count($dummyUsers),
            $perPage,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        return view('users', compact('users'));
    }
}
