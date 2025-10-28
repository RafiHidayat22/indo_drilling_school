<aside class="fixed left-0 top-0 w-64 h-screen overflow-y-auto z-40 bg-slate-800 shadow-xl">
    <!-- Logo Section -->
    <div class="p-6 flex items-center justify-center border-b border-slate-700">
        <img src="{{ asset('logo.png') }}" alt="Indonesia Drilling School" class="w-12 h-12 object-contain mr-3">
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

            <!-- Pelatihan -->
            <a href="#"
                class="sidebar-menu-item flex items-center px-4 py-3 
                      {{ request()->is('pelatihan*') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                      rounded-lg">
                <div class="sidebar-icon">
                    <i class="fas fa-graduation-cap text-lg"></i>
                </div>
                <span class="ml-4">Pelatihan</span>
            </a>

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
        </div>

        <!-- Divider -->
        <div class="border-t border-slate-700 my-6"></div>

        <!-- Additional Menu -->
        <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-4 mb-3">Pengaturan</p>

            <!-- Pengaturan -->
            <a href="#"
                class="sidebar-menu-item flex items-center px-4 py-3 
                      {{ request()->is('pengaturan*') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                      rounded-lg">
                <div class="sidebar-icon">
                    <i class="fas fa-cog text-lg"></i>
                </div>
                <span class="ml-4">Pengaturan</span>
            </a>

            <!-- Laporan -->
            <a href="#"
                class="sidebar-menu-item flex items-center px-4 py-3 
                      {{ request()->is('laporan*') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:text-white hover:bg-slate-700' }} 
                      rounded-lg">
                <div class="sidebar-icon">
                    <i class="fas fa-chart-line text-lg"></i>
                </div>
                <span class="ml-4">Laporan</span>
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