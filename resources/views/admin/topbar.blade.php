<!-- resources/views/admin/topbar.blade.php -->

<header class="fixed top-0 left-64 right-0 h-16 bg-white shadow-sm z-30 flex items-center px-6">
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
            <span class="font-medium text-gray-800">{{ $pageTitle ?? 'Overview' }}</span>
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
            <button class="profile-dropdown flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-50 transition-colors duration-200" id="profileBtn">
                <img
                    src="{{ user_avatar_url()}}"
                    alt="Profile"
                    class="w-9 h-9 rounded-full object-cover ring-2 ring-purple-100">
                <div class="hidden md:block text-left">
                    <p class="text-sm font-semibold text-gray-800">{{ current_user()->username }}</p>
                    <p class="text-xs text-gray-500">
                        {{ current_user()->role === 'superAdmin' ? 'Super Administrator' : 'Administrator' }}
                    </p>
                </div>
                <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200" id="profileChevron"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-40 opacity-0 transform scale-95 transition-all duration-200" id="profileDropdown">
                <!-- User Info -->
                <div class="p-4 border-b border-gray-100">
                    <div class="flex items-center space-x-3">
                        <img
                            src="{{ user_avatar_url() }}"
                            alt="Profile"
                            class="w-12 h-12 rounded-full object-cover ring-2 ring-purple-200">
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 truncate">{{ current_user()->username }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ current_user()->email }}</p>
                            {!! user_role_badge() !!}
                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <div class="py-2">
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition-colors duration-150">
                        <i class="fas fa-user-circle w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Profil Saya</span>
                    </a>
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition-colors duration-150">
                        <i class="fas fa-cog w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Pengaturan</span>
                    </a>
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition-colors duration-150">
                        <i class="fas fa-question-circle w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Bantuan</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-100"></div>

                <!-- Logout -->
                <div class="p-2">
                    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item flex items-center px-4 py-3 text-red-600 hover:bg-red-50 w-full rounded-lg transition-colors duration-150">
                            <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                            <span class="text-sm font-medium">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile Dropdown Toggle with Animation
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');
        const profileChevron = document.getElementById('profileChevron');

        profileBtn?.addEventListener('click', function(e) {
            e.stopPropagation();
            const isHidden = profileDropdown.classList.contains('hidden');

            if (isHidden) {
                // Show dropdown
                profileDropdown.classList.remove('hidden');
                setTimeout(() => {
                    profileDropdown.classList.remove('opacity-0', 'scale-95');
                    profileDropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
                profileChevron?.classList.add('rotate-180');
            } else {
                // Hide dropdown
                profileDropdown.classList.remove('opacity-100', 'scale-100');
                profileDropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    profileDropdown.classList.add('hidden');
                }, 200);
                profileChevron?.classList.remove('rotate-180');
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileBtn?.contains(e.target) && !profileDropdown?.contains(e.target)) {
                profileDropdown?.classList.remove('opacity-100', 'scale-100');
                profileDropdown?.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    profileDropdown?.classList.add('hidden');
                }, 200);
                profileChevron?.classList.remove('rotate-180');
            }
        });

        // Fullscreen Toggle
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        fullscreenBtn?.addEventListener('click', function() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
                this.querySelector('i').classList.replace('fa-expand', 'fa-compress');
            } else {
                document.exitFullscreen();
                this.querySelector('i').classList.replace('fa-compress', 'fa-expand');
            }
        });

        // Logout with Loading State
        const logoutForm = document.getElementById('logoutForm');
        logoutForm?.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const icon = submitBtn.querySelector('i');
            const text = submitBtn.querySelector('span');

            // Disable button and show loading
            submitBtn.disabled = true;
            icon.classList.remove('fa-sign-out-alt');
            icon.classList.add('fa-spinner', 'fa-spin');
            text.textContent = 'Memproses...';

            // Form will submit normally
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        mobileMenuBtn?.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar?.classList.toggle('-translate-x-full');

            // Toggle overlay
            const overlay = document.getElementById('sidebarOverlay');
            if (overlay) {
                overlay.classList.toggle('hidden');
            }
        });
    });
</script>

<style>
    /* Smooth transitions for dropdown */
    .dropdown-menu {
        transition: opacity 0.2s ease, transform 0.2s ease;
    }

    /* Smooth rotation for chevron */
    #profileChevron {
        transition: transform 0.2s ease;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }
</style>