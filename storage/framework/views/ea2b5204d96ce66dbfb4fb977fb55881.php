<nav class="bg-gray-100 shadow-sm">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">

    
    <a href="<?php echo e(url('/')); ?>" class="flex items-center space-x-2">
      <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="w-10 h-10">
      <span class="font-semibold text-gray-800 text-lg">Indonesia Drilling School</span>
    </a>

    
    <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg id="menu-icon" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    
    <div class="hidden md:flex items-center space-x-6">
      <a href="<?php echo e(url('/')); ?>" class="text-gray-700 hover:text-red-700 font-medium transition">Home</a>
      <a href="<?php echo e(url('/about')); ?>" class="text-gray-700 hover:text-red-700 font-medium transition">About Us</a>
      <a href="<?php echo e(url('/program')); ?>" class="text-gray-700 hover:text-red-700 font-medium transition">Programs</a>
      <a href="<?php echo e(url('/articles')); ?>" class="text-gray-700 hover:text-red-700 font-medium transition">Articles</a>
      <a href="<?php echo e(url('/contact')); ?>" class="text-gray-700 hover:text-red-700 font-medium transition">Contact</a>

      <a href="<?php echo e(url('/contact')); ?>"
        class="bg-red-700 text-white px-4 py-2 rounded-md hover:bg-red-800 transition font-semibold">
        Join Now
      </a>
    </div>
  </div>

  <div id="mobile-menu" class="md:hidden overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 0;">
    <div class="px-4 pb-4 pt-2 space-y-2 bg-gray-100">
      <a href="<?php echo e(url('/')); ?>" class="block text-gray-700 hover:text-red-700 font-medium py-2">Home</a>
      <a href="<?php echo e(url('/about')); ?>" class="block text-gray-700 hover:text-red-700 font-medium py-2">About Us</a>
      <a href="<?php echo e(url('/program')); ?>" class="block text-gray-700 hover:text-red-700 font-medium py-2">Programs</a>
      <a href="<?php echo e(url('/articles')); ?>" class="block text-gray-700 hover:text-red-700 font-medium py-2">Articles</a>
      <a href="<?php echo e(url('/contact')); ?>" class="block text-gray-700 hover:text-red-700 font-medium py-2">Contact</a>
      <a href="<?php echo e(url('/contact')); ?>"
        class="block text-center bg-red-700 text-white py-2 rounded-md hover:bg-red-800 transition font-semibold mt-2">
        Join Now
      </a>
    </div>
  </div>

</nav>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('menu-icon');
    let isOpen = false;

    toggle.addEventListener('click', () => {
      if (isOpen) {
        // Tutup menu
        menu.style.maxHeight = '0';
        icon.style.transform = 'rotate(0deg)';
        isOpen = false;
      } else {
        // Buka menu - set ke tinggi konten sebenarnya
        menu.style.maxHeight = menu.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
        isOpen = true;
      }
    });
  });
</script><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views/partials/navbar.blade.php ENDPATH**/ ?>