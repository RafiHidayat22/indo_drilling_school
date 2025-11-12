<?php

if (!function_exists('current_user')) {
    /**
     * Get current authenticated user
     */
    function current_user()
    {
        return auth()->user();
    }
}

if (!function_exists('is_super_admin')) {
    /**
     * Check if current user is super admin
     */
    function is_super_admin()
    {
        return auth()->check() && auth()->user()->role === 'superAdmin';
    }
}

if (!function_exists('is_admin')) {
    /**
     * Check if current user is admin or super admin
     */
    function is_admin()
    {
        return auth()->check() && in_array(auth()->user()->role, ['admin', 'superAdmin']);
    }
}

if (!function_exists('user_role_badge')) {
    /**
     * Get user role badge HTML
     */
    function user_role_badge($role = null)
    {
        $role = $role ?? auth()->user()?->role;

        $badges = [
            'superAdmin' => '<span class="px-2 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">Super Admin</span>',
            'admin' => '<span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Admin</span>',
        ];

        return $badges[$role] ?? '<span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700">User</span>';
    }
}

if (!function_exists('user_avatar_url')) {
    /**
     * Get user avatar URL
     */
    function user_avatar_url($username = null, $size = 100)
    {
        $name = $username ?? auth()->user()?->username ?? 'User';
        return "https://ui-avatars.com/api/?name=" . urlencode($name) . "&background=7e22ce&color=fff&bold=true&size={$size}";
    }
}
