<aside class="fixed left-0 top-0 w-64 h-screen overflow-y-auto z-40 bg-slate-800 shadow-xl">
    <!-- Logo Section -->
    <div class="p-6 flex items-center justify-center border-b border-slate-700">
        <img src="{{ asset('images/logo.png') }}" alt="Indonesia Drilling School" class="w-12 h-12 object-contain mr-3">
        <div class="text-white">
            <h2 class="font-bold text-lg leading-tight">Indonesia</h2>
            <p class="text-xs text-slate-400">Drilling School</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="px-4 py-6">
        <div class="mb-2">
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-4 mb-3">Menu Utama</p>

            <!-- Dashboard -->
            <a href="{{ url('/dashboard') }}"
                class="sidebar-menu-item flex items-center px-4 py-3 
                      {{ request()->is('dashboard') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                      rounded-lg font-medium">
                <div class="sidebar-icon">
                    <i class="fas fa-home text-lg"></i>
                </div>
                <span class="ml-4">Dashboard</span>
            </a>

            <!-- Artikel -->
            <a href="{{ url('/articleadmin') }}"
                class="sidebar-menu-item flex items-center px-4 py-3 
                      {{ request()->is('articleadmin') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                      rounded-lg">
                <div class="sidebar-icon">
                    <i class="fas fa-newspaper text-lg"></i>
                </div>
                <span class="ml-4">Artikel</span>
                <span class="ml-auto bg-red-500 text-white px-2 py-0.5 rounded-full text-xs font-bold">12</span>
            </a>

            <!-- Pelatihan dengan Dropdown -->
            <div class="relative">
                <button onclick="toggleDropdown()"
                    class="sidebar-menu-item flex items-center px-4 py-3 w-full
                          {{ request()->is('training*') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                          rounded-lg">
                    <div class="sidebar-icon">
                        <i class="fas fa-graduation-cap text-lg"></i>
                    </div>
                    <span class="ml-4">Pelatihan</span>
                    <i class="fas fa-chevron-down ml-auto text-sm transition-transform duration-300" id="dropdownIcon"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="hidden mt-1 ml-4 space-y-1">
                    <a href="{{ url('/training') }}"
                        class="flex items-center px-4 py-2 
                              {{ request()->is('training/input*') ? 'bg-slate-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-700' }} 
                              rounded-lg text-sm">
                        <i class="fas fa-plus-circle text-xs mr-3"></i>
                        <span>Input Pelatihan</span>
                    </a>
                    <a href="{{ url('/categories') }}"
                        class="flex items-center px-4 py-2 
                              {{ request()->is('training/kategori*') ? 'bg-slate-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-700' }} 
                              rounded-lg text-sm">
                        <i class="fas fa-tags text-xs mr-3"></i>
                        <span>Input Kategori</span>
                    </a>
                </div>
            </div>
            <!-- Divider -->
            <div class="border-t border-slate-700 my-6"></div>
            <!-- Tambah User -->
            <a href="{{ url('/users') }}"
                class="sidebar-menu-item flex items-center px-4 py-3 
                      {{ request()->is('users') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                      rounded-lg">
                <div class="sidebar-icon">
                    <i class="fas fa-user-plus text-lg"></i>
                </div>
                <span class="ml-4">Tambah User</span>
            </a>
            <!-- Contact Admin -->
            <a href="{{ route('contactadmin') }}" {{-- Gunakan nama route yang didefinisikan di web.php --}}
                class="sidebar-menu-item flex items-center px-4 py-3 {{ request()->is('contactadmin*') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} rounded-lg">
                <div class="sidebar-icon">
                    <i class="fas fa-phone text-lg"></i> {{-- Gunakan ikon yang sesuai --}}
                </div>
                <span class="ml-4">Contact Admin</span>
            </a>

        </div>
    </nav>

    <!-- Footer Section -->
    <div class="absolute bottom-0 left-0 right-0 p-4">
        <div class="rounded-lg p-3 text-center">
            <i class="fas fa-info-circle text-blue-400 mb-2 text-xl"></i>
            <p class="text-xs text-slate-300 font-medium">Version 1.0.0</p>
            <p class="text-[10px] text-slate-500 mt-1">© 2025 IDS</p>
        </div>
    </div>
</aside>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        const icon = document.getElementById('dropdownIcon');

        dropdown.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    // Auto-expand dropdown jika sedang di halaman training
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        if (currentPath.includes('/training')) {
            const dropdown = document.getElementById('dropdownMenu');
            const icon = document.getElementById('dropdownIcon');
            dropdown.classList.remove('hidden');
            icon.classList.add('rotate-180');
        }
    });
</script>