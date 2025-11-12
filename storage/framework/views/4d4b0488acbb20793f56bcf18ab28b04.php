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
            <span class="font-medium text-gray-800"><?php echo e($pageTitle ?? 'Overview'); ?></span>
        </nav>
    </div>

    <!-- Right Section -->
    <div class="flex items-center space-x-3">

        <!-- Messages -->
        <!-- Messages Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button
                @click="open = !open"
                class="topbar-icon-btn relative rounded-lg w-10 h-10 flex items-center justify-center"
                title="Pesan"
                @click.away="open = false">
                <i class="fas fa-envelope text-gray-600 text-lg"></i>
                <?php if($unreadInquiries->count() > 0): ?>
                <span class="absolute top-1 right-1 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                    <?php echo e($unreadInquiries->count()); ?>

                </span>
                <?php endif; ?>
            </button>

            <!-- Dropdown Content -->
            <div
                x-show="open"
                class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-40"
                style="display: none;"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1">
                <!-- Header -->
                <div class="p-3 border-b border-gray-200">
                    <h3 class="text-sm font-semibold text-gray-800">Pesan Kontak Baru</h3>
                </div>

                <!-- Messages List -->
                <?php if($unreadInquiries->count() > 0): ?>
                <div class="max-h-80 overflow-y-auto">
                    <?php $__currentLoopData = $unreadInquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('admin.contacts.show', $inq)); ?>"
                        data-mark-read-url="<?php echo e(route('admin.contacts.mark-read', $inq)); ?>"
                        class="block p-3 hover:bg-blue-50 border-b border-gray-100 last:border-b-0">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-600 text-xs"></i>
                                </div>
                            </div>
                            <div class="ml-3 flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    <?php echo e($inq->full_name); ?>

                                </p>
                                <p class="text-xs text-gray-600 line-clamp-1">
                                    <?php echo e($inq->subject); ?>

                                </p>
                                <p class="text-xs text-gray-500 mt-1">
                                    <?php echo e($inq->created_at->diffForHumans()); ?>

                                </p>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="p-2 border-t border-gray-100 bg-gray-50 text-center">
                    <a href="<?php echo e(route('contactadmin')); ?>" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">
                        Lihat Semua Pesan
                    </a>
                </div>
                <?php else: ?>
                <div class="p-4 text-center text-sm text-gray-500">
                    Tidak ada pesan baru.
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Fullscreen Toggle -->
        <button class="topbar-icon-btn hidden lg:flex rounded-lg w-10 h-10 items-center justify-center" id="fullscreenBtn" title="Fullscreen">
            <i class="fas fa-expand text-gray-600"></i>
        </button>

        <!-- Divider -->
        <div class="h-8 w-px bg-gray-200 hidden md:block"></div>

        <!-- Profile Dropdown -->
        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button
                @click="open = !open"
                class="profile-dropdown flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-50 transition-colors duration-200"
                @click.away="open = false">
                <img
                    src="<?php echo e(user_avatar_url()); ?>"
                    alt="Profile"
                    class="w-9 h-9 rounded-full object-cover ring-2 ring-purple-100">
                <div class="hidden md:block text-left">
                    <p class="text-sm font-semibold text-gray-800"><?php echo e(current_user()->username); ?></p>
                    <p class="text-xs text-gray-500">
                        <?php echo e(current_user()->role === 'superAdmin' ? 'Super Administrator' : 'Administrator'); ?>

                    </p>
                </div>
                <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200"
                    :class="{ 'rotate-180': open }"></i>
            </button>

            <!-- Dropdown Menu -->
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-40"
                style="display: none;">

                <!-- User Info -->
                <div class="p-4 border-b border-gray-100">
                    <div class="flex items-center space-x-3">
                        <img
                            src="<?php echo e(user_avatar_url()); ?>"
                            alt="Profile"
                            class="w-12 h-12 rounded-full object-cover ring-2 ring-purple-200">
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 truncate"><?php echo e(current_user()->username); ?></p>
                            <p class="text-xs text-gray-500 truncate"><?php echo e(current_user()->email); ?></p>
                            <?php echo user_role_badge(); ?>

                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <div class="py-2">
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition-colors duration-150">
                        <i class="fas fa-user-circle w-5 mr-3 text-gray-400"></i>
                        <span class="text-sm font-medium">Profil Saya</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-100"></div>

                <!-- Logout -->
                <div class="p-2">
                    <form id="logoutForm" method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
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
        // =============== FULLSCREEN ===============
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

        // =============== LOGOUT ===============
        const logoutForm = document.getElementById('logoutForm');
        logoutForm?.addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            const icon = btn.querySelector('i');
            const text = btn.querySelector('span');
            btn.disabled = true;
            icon.classList.replace('fa-sign-out-alt', 'fa-spinner');
            icon.classList.add('fa-spin');
            text.textContent = 'Memproses...';
        });

        // =============== MOBILE MENU ===============
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        mobileMenuBtn?.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar?.classList.toggle('-translate-x-full');
            overlay?.classList.toggle('hidden');
        });

        // =============== PESAN & NOTIFIKASI ===============
        let lastUnreadCount = {
            {
                $unreadInquiries - > count() ?? 0
            }
        };
        const audio = new Audio('/sounds/notifpesan.ogg');
        audio.volume = 0.6;

        let toastContainer = null;

        function showToast(message) {
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toast-container';
                toastContainer.className = 'fixed top-20 right-4 z-50 space-y-2';
                document.body.appendChild(toastContainer);
            }

            const toast = document.createElement('div');
            toast.className = 'bg-blue-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center animate-fade-in-up';
            toast.innerHTML = `<i class="fas fa-envelope mr-2"></i> ${message}`;
            toastContainer.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('animate-fade-out');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        function updateMessageCount() {
            fetch('/api/contact-inquiries/unread-count')
                .then(res => res.ok ? res.json() : Promise.reject('Gagal ambil data'))
                .then(data => {
                    const btn = document.querySelector('.topbar-icon-btn[title="Pesan"]');
                    if (!btn) return;

                    const badge = btn.querySelector('.absolute');
                    const current = data.count;

                    if (current > 0) {
                        if (badge) {
                            badge.textContent = current;
                        } else {
                            const el = document.createElement('span');
                            el.className = 'absolute top-1 right-1 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full';
                            el.textContent = current;
                            btn.appendChild(el);
                        }
                    } else if (badge) {
                        badge.remove();
                    }

                    if (current > lastUnreadCount && lastUnreadCount >= 0) {
                        const diff = current - lastUnreadCount;
                        const msg = diff === 1 ?
                            'Ada 1 pesan kontak baru!' :
                            `Ada ${diff} pesan kontak baru!`;

                        if (!document.hidden) {
                            audio.play().catch(e => console.warn('Suara diblokir:', e));
                        }
                        showToast(msg);
                    }

                    lastUnreadCount = current;
                })
                .catch(err => console.warn('Error update pesan:', err));
        }

        // Tandai sebagai dibaca saat klik pesan
        document.addEventListener('click', function(e) {
            const link = e.target.closest('[data-mark-read-url]');
            if (link) {
                const url = link.dataset.markReadUrl;
                if (!url) return;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                }).catch(err => console.warn('Gagal tandai dibaca:', err));
            }
        });

        updateMessageCount();
        setInterval(updateMessageCount, 30000);

        // =============== ANIMASI TOAST ===============
        const style = document.createElement('style');
        style.textContent = `
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-out {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-10px); }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.3s ease-out forwards;
        }
        .animate-fade-out {
            animation: fade-out 0.3s ease-out forwards;
        }
        .rotate-180 {
            transform: rotate(180deg);
        }
    `;
        document.head.appendChild(style);
    });
</script><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\admin\topbar.blade.php ENDPATH**/ ?>