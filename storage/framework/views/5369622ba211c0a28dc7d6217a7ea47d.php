<!-- resources/views/admin/topbar.blade.php -->

<header class="fixed top-0 left-64 right-0 h-16 bg-white shadow-sm z-30 flex items-center px-6"> <!-- Gunakan Tailwind untuk warna dan posisi -->
    <!-- Left Section -->
    <div class="flex items-center space-x-4 flex-1">
        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn topbar-icon-btn" id="mobileMenuBtn">
            <i class="fas fa-bars text-gray-600"></i>
        </button>

        <!-- Breadcrumb -->
        <nav class="hidden md:flex items-center text-sm text-gray-600">
            <span class="flex items-center">
                <i class="fas fa-home text-xs mr-2"></i>
                Dashboard
            </span>
            <span class="mx-2">/</span>
            <span class="font-medium text-gray-800">Overview</span>
        </nav>
    </div>

    <!-- Right Section -->
    <div class="flex items-center space-x-3">

        <!-- Notifications -->
        <button class="topbar-icon-btn relative rounded-lg w-10 h-10 flex items-center justify-center" title="Notifikasi">
            <i class="fas fa-bell text-gray-600 text-lg"></i>
            <span class="absolute top-1 right-1 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">5</span>
        </button>

        <!-- Messages -->
        <button class="topbar-icon-btn relative rounded-lg w-10 h-10 flex items-center justify-center" title="Pesan">
            <i class="fas fa-envelope text-gray-600 text-lg"></i>
            <span class="absolute top-1 right-1 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">3</span>
        </button>

        <!-- Fullscreen Toggle -->
        <button class="topbar-icon-btn hidden lg:flex rounded-lg w-10 h-10 items-center justify-center" id="fullscreenBtn" title="Fullscreen">
            <i class="fas fa-expand text-gray-600"></i>
        </button>

        <!-- Divider -->
        <div class="h-8 w-px bg-gray-200 hidden md:block"></div>

        <!-- Profile Dropdown -->
        <div class="relative">
            <button class="profile-dropdown flex items-center space-x-3 px-3 py-2 rounded-lg" id="profileBtn">
                <img
                    src=" https://ui-avatars.com/api/?name=Admin+User&background=7e22ce&color=fff&bold=true"
                    alt="Profile"
                    class="w-9 h-9 rounded-full object-cover ring-2 ring-purple-100">
                <div class="hidden md:block text-left">
                    <p class="text-sm font-semibold text-gray-800">Admin User</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <i class="fas fa-chevron-down text-xs text-gray-400"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-40" id="profileDropdown">
                <!-- User Info -->
                <div class="p-4 border-b border-gray-100">
                    <div class="flex items-center space-x-3">
                        <img
                            src="  https://ui-avatars.com/api/?name=Admin+User&background=7e22ce&color=fff&bold=true"
                            alt="Profile"
                            class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <p class="font-semibold text-gray-800">Admin User</p>
                            <p class="text-xs text-gray-500">admin@ids.com</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <div class="py-2">
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600">
                        <i class="fas fa-user-circle w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Profil Saya</span>
                    </a>
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600">
                        <i class="fas fa-cog w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Pengaturan</span>
                    </a>
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600">
                        <i class="fas fa-question-circle w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Bantuan</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-100"></div>

                <!-- Logout -->
                <div class="p-2">
                    <button type="button" class="dropdown-item flex items-center px-4 py-3 text-red-600 hover:bg-red-50 w-full rounded-lg">
                        <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                        <span class="text-sm font-medium">Keluar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views/admin/topbar.blade.php ENDPATH**/ ?>