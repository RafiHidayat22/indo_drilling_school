<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-gray-100 shadow-sm transition-all duration-300">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">

    {{-- Logo dan Nama --}}
    <a href="{{ url('/') }}" class="flex items-center space-x-2">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10">
      <span class="font-semibold text-gray-800 text-lg">Indonesia Drilling School</span>
    </a>

    {{-- Tombol Toggle untuk Mobile --}}
    <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg id="menu-icon" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path id="icon-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    {{-- Menu Utama (Desktop) --}}
    <div class="hidden md:flex items-center space-x-6">
      <a href="{{ url('/') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Home</a>
      <a href="{{ url('/about') }}" class="text-gray-700 hover:text-red-700 font-medium transition">About Us</a>
      <a href="{{ url('/program') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Programs</a>
      <a href="{{ url('/projects') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Projects</a>
      <a href="{{ url('/articles') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Articles</a>
      <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Contact</a>

      <a href="{{ url('/contact') }}"
        class="bg-red-700 text-white px-4 py-2 rounded-md hover:bg-red-800 transition font-semibold">
        Join Now
      </a>
    </div>
  </div>

  {{-- Mobile Menu dengan efek glass --}}
  <div id="mobile-menu" class="md:hidden overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 0;">
    <div id="mobile-menu-content" class="px-4 pb-4 pt-2 space-y-2">
      <a href="{{ url('/') }}" class="block text-gray-700 hover:text-red-700 hover:bg-white/50 font-medium py-2 px-3 rounded-lg transition">Home</a>
      <a href="{{ url('/about') }}" class="block text-gray-700 hover:text-red-700 hover:bg-white/50 font-medium py-2 px-3 rounded-lg transition">About Us</a>
      <a href="{{ url('/program') }}" class="block text-gray-700 hover:text-red-700 hover:bg-white/50 font-medium py-2 px-3 rounded-lg transition">Programs</a>
      <a href="{{ url('/projects') }}" class="block text-gray-700 hover:text-red-700 hover:bg-white/50 font-medium py-2 px-3 rounded-lg transition">Projects</a>
      <a href="{{ url('/articles') }}" class="block text-gray-700 hover:text-red-700 hover:bg-white/50 font-medium py-2 px-3 rounded-lg transition">Articles</a>
      <a href="{{ url('/contact') }}" class="block text-gray-700 hover:text-red-700 hover:bg-white/50 font-medium py-2 px-3 rounded-lg transition">Contact</a>
      <a href="{{ url('/contact') }}"
        class="block text-center bg-red-700 text-white py-2 rounded-md hover:bg-red-800 transition font-semibold mt-2">
        Join Now
      </a>
    </div>
  </div>

</nav>

{{-- Spacer untuk konten tidak tertutup navbar --}}
<div class="h-16"></div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const menuContent = document.getElementById('mobile-menu-content');
    const icon = document.getElementById('menu-icon');
    const iconPath = document.getElementById('icon-path');
    const navbar = document.getElementById('navbar');
    let isOpen = false;
    let lastScroll = 0;

    // Toggle Mobile Menu dengan icon berubah
    toggle.addEventListener('click', () => {
      if (isOpen) {
        menu.style.maxHeight = '0';
        icon.style.transform = 'rotate(0deg)';
        iconPath.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
        isOpen = false;
      } else {
        menu.style.maxHeight = menu.scrollHeight + 'px';
        icon.style.transform = 'rotate(90deg)';
        iconPath.setAttribute('d', 'M6 18L18 6M6 6l12 12');
        isOpen = true;
      }
    });

    // Scroll Effect
    window.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      // Efek glass saat scroll lebih dari 50px
      if (currentScroll > 50) {
        navbar.classList.add('bg-white/80', 'backdrop-blur-md', 'shadow-lg');
        navbar.classList.remove('bg-gray-100', 'shadow-sm');

        // Menu mobile juga ikut transparan
        menuContent.classList.add('bg-white/70', 'backdrop-blur-md');
        menuContent.classList.remove('bg-gray-100');
      } else {
        navbar.classList.remove('bg-white/80', 'backdrop-blur-md', 'shadow-lg');
        navbar.classList.add('bg-gray-100', 'shadow-sm');

        // Menu mobile kembali normal
        menuContent.classList.remove('bg-white/70', 'backdrop-blur-md');
      }

      // Hide navbar saat scroll down, show saat scroll up
      if (currentScroll > lastScroll && currentScroll > 300) {
        navbar.style.transform = 'translateY(-100%)';
      } else {
        navbar.style.transform = 'translateY(0)';
      }

      lastScroll = currentScroll;
    });
  });
</script>