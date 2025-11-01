<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Check if current user is super admin
     */
    private function checkSuperAdmin()
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'superAdmin') {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Hanya Super Admin yang dapat mengakses resource ini.'
            ], 403);
        }
        
        return null; // Continue if super admin
    }

    /**
     * Login user
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.',
            ], 401);
        }

        if ($user->status === 'Inactive') {
            return response()->json([
                'success' => false,
                'message' => 'Akun Anda tidak aktif. Silakan hubungi administrator.',
            ], 403);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'status' => $user->status,
                ],
                'token' => $token,
            ]
        ], 200);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil',
        ], 200);
    }

    /**
     * Get user yang sedang login
     */
    public function me(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data' => ['user' => $user]
        ], 200);
    }

    /**
     * Get all users (Super Admin only)
     */
    public function getAllUsers(Request $request)
    {
        // Check super admin
        $check = $this->checkSuperAdmin();
        if ($check) return $check;

        $users = User::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

    /**
     * Get single user by ID
     */
    public function getUser($id)
    {
        // Check super admin
        $check = $this->checkSuperAdmin();
        if ($check) return $check;

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * Register/Create user baru (Super Admin only)
     */
    public function register(Request $request)
    {
        // Check super admin
        $check = $this->checkSuperAdmin();
        if ($check) return $check;

        try {
            $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,superAdmin',
            ]);

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => 'Active',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil ditambahkan',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'role' => $user->role,
                        'status' => $user->status,
                        'created_at' => $user->created_at,
                    ]
                ]
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update user (Super Admin only)
     */
    public function updateUser(Request $request, $id)
    {
        // Check super admin
        $check = $this->checkSuperAdmin();
        if ($check) return $check;

        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan',
                ], 404);
            }

            if ($user->id === Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak dapat mengedit akun Anda sendiri',
                ], 403);
            }

            $request->validate([
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'role' => 'required|in:admin,superAdmin',
                'status' => 'required|in:Active,Inactive',
            ]);

            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->status = $request->status;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil diupdate',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'role' => $user->role,
                        'status' => $user->status,
                    ]
                ]
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete user (Super Admin only)
     */
    public function deleteUser($id)
    {
        // Check super admin
        $check = $this->checkSuperAdmin();
        if ($check) return $check;

        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan',
                ], 404);
            }

            if ($user->id === Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak dapat menghapus akun Anda sendiri',
                ], 403);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}