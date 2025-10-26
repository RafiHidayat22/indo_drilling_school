<nav class="bg-gray-100 shadow-sm">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">

    {{-- Logo dan Nama --}}
    <a href="{{ url('/') }}" class="flex items-center space-x-2">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10">
      <span class="font-semibold text-gray-800 text-lg">Indonesia Drilling School</span>
    </a>

    {{-- Tombol Toggle untuk Mobile --}}
    <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    {{-- Menu Utama --}}
    <div id="menu" class="hidden md:flex items-center space-x-6">
      <a href="{{ url('/') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Home</a>
      <a href="{{ url('/about') }}" class="text-gray-700 hover:text-red-700 font-medium transition">About Us</a>
      <a href="{{ url('/programs') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Programs</a>
      <a href="{{ url('/gallery') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Articles</a>
      <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-red-700 font-medium transition">Contact</a>

      <a href="{{ url('/join') }}"
         class="bg-red-700 text-white px-4 py-2 rounded-md hover:bg-red-800 transition font-semibold">
         Join Now
      </a>
    </div>
  </div>

  {{-- Dropdown Mobile Menu --}}
  <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 bg-gray-100">
    <a href="{{ url('/') }}" class="block text-gray-700 hover:text-red-700 font-medium">Home</a>
    <a href="{{ url('/about') }}" class="block text-gray-700 hover:text-red-700 font-medium">About Us</a>
    <a href="{{ url('/programs') }}" class="block text-gray-700 hover:text-red-700 font-medium">Programs</a>
    <a href="{{ url('/gallery') }}" class="block text-gray-700 hover:text-red-700 font-medium">Articles</a>
    <a href="{{ url('/contact') }}" class="block text-gray-700 hover:text-red-700 font-medium">Contact</a>
    <a href="{{ url('/join') }}"
       class="block text-center bg-red-700 text-white py-2 rounded-md hover:bg-red-800 transition font-semibold">
       Join Now
    </a>
  </div>
</nav>

<script>
  // Toggle menu untuk mobile
  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    toggle.addEventListener('click', () => menu.classList.toggle('hidden'));
  });
</script>
