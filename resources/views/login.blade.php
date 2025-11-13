<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Indonesia Drilling School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e22ce 100%);
            position: relative;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 15s infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .logo-container-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .logo-container-box:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.2);
        }

        .input-field {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            background: #f9fafb;
        }

        .input-field:focus {
            border-color: #7e22ce;
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(126, 34, 206, 0.15);
        }

        .btn-login {
            background: linear-gradient(135deg, #7e22ce 0%, #9333ea 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(126, 34, 206, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .logo-container {
            animation: fadeInDown 0.8s ease-out;
        }

        .form-container {
            animation: fadeInUp 0.8s ease-out;
        }

        @media (max-width: 640px) {
            .form-container {
                padding: 1.5rem;
            }

            .logo-container-box {
                padding: 1rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .form-container {
                padding: 2rem;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert {
            animation: slideInRight 0.4s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .password-toggle {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .password-toggle:hover {
            color: #7e22ce;
            transform: scale(1.1);
        }

        .checkbox-custom:checked {
            background-color: #7e22ce;
            border-color: #7e22ce;
        }

        .link-hover {
            position: relative;
            transition: color 0.3s ease;
        }

        .link-hover::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #7e22ce;
            transition: width 0.3s ease;
        }

        .link-hover:hover::after {
            width: 100%;
        }

        .icon-contact {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f3f4f6;
            transition: all 0.3s ease;
        }

        .icon-contact:hover {
            background: #7e22ce;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(126, 34, 206, 0.3);
        }

        .header-badge {
            background: linear-gradient(135deg, rgba(126, 34, 206, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%);
            border: 1px solid rgba(126, 34, 206, 0.2);
        }

        /* Nonaktifkan toggle password bawaan browser */
        input[type="password"]::-webkit-password-reveal-button {
            display: none !important;
            -webkit-appearance: none;
            appearance: none;
        }

        /* Untuk IE/Edge lama */
        input[type="password"]::-ms-reveal {
            display: none;
        }

        /* Jika ada tombol clear otomatis */
        input[type="password"]::-ms-clear {
            display: none;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Animated Background Particles -->
    <div class="particle" style="width: 100px; height: 100px; left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="width: 150px; height: 150px; left: 60%; animation-delay: 3s;"></div>
    <div class="particle" style="width: 80px; height: 80px; left: 80%; animation-delay: 6s;"></div>
    <div class="particle" style="width: 120px; height: 120px; left: 30%; animation-delay: 9s;"></div>
    <div class="particle" style="width: 90px; height: 90px; left: 50%; animation-delay: 12s;"></div>

    <div class="w-full max-w-md relative z-10 px-4 sm:px-6">
        <!-- Logo dan Header -->
        <div class="logo-container text-center mb-8 px-4">
            <div class="flex justify-center mb-6">
                <div class="logo-container-box p-5 rounded-2xl">
                    <img src="{{ asset('images/logo.png') }}" alt="Indonesia Drilling School Logo" class="w-20 h-20 sm:w-24 sm:h-24 object-contain">
                </div>
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-3 tracking-tight leading-tight px-2">Indonesia Drilling School</h1>
            <div class="header-badge inline-block px-5 py-2 rounded-full mt-2">
                <span class="text-white text-base sm:text-lg font-semibold">Admin Portal</span>
            </div>
        </div>

        <!-- Form Login -->
        <div class="form-container glass-effect rounded-2xl p-6 sm:p-8 shadow-2xl">
            <div class="text-center mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-1">Selamat Datang</h2>
                <p class="text-gray-500 text-xs sm:text-sm">Silakan masuk ke akun admin Anda</p>
            </div>

            @if(session('success'))
            <div class="alert bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg animate-slideInRight">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <!-- Alert Error -->
            @if(session('error'))
            <div class="alert bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg animate-slideInRight">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                    <p class="text-red-700 text-sm font-medium">{{ session('error') }}</p>
                </div>
            </div>
            @endif

            <div id="errorAlert" class="hidden alert bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg animate-slideInRight">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                    <p id="errorMessage" class="text-red-700 text-sm font-medium"></p>
                </div>
            </div>


            <form id="loginForm">
                <!-- Email Field -->
                <div class="mb-5">
                    <label for="email" class="flex items-center text-gray-700 text-xs sm:text-sm font-semibold mb-2">
                        <i class="fas fa-envelope text-purple-600 mr-2 text-sm"></i>
                        <span>Email</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="input-field w-full px-4 py-3 sm:py-3.5 rounded-xl focus:outline-none text-gray-700 text-sm sm:text-base"
                        placeholder="Masukkan email Anda"
                        required>
                </div>

                <!-- Password Field -->
                <div class="mb-5">
                    <label for="password" class="flex items-center text-gray-700 text-xs sm:text-sm font-semibold mb-2">
                        <i class="fas fa-lock text-purple-600 mr-2 text-sm"></i>
                        <span>Password</span>
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="input-field w-full px-4 py-3 sm:py-3.5 rounded-xl focus:outline-none text-gray-700 text-sm sm:text-base"
                            placeholder="Masukkan password Anda"
                            required>
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg hover:text-purple-600 transition">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-3 sm:gap-0">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" name="remember" class="checkbox-custom w-4 h-4 text-purple-600 border-2 border-gray-300 rounded focus:ring-2 focus:ring-purple-500">
                        <span class="ml-2 text-xs sm:text-sm text-gray-600 font-medium group-hover:text-gray-800 transition">Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="btn-login w-full text-white font-bold py-3 sm:py-3.5 rounded-xl focus:outline-none focus:ring-4 focus:ring-purple-300 text-sm sm:text-base">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Dashboard
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-3 text-gray-400 text-xs font-medium">atau</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>

            <!-- Additional Info -->
            <div class="text-center">
                <p class="text-xs sm:text-sm text-gray-600 mb-4 font-medium">
                    Butuh bantuan? Hubungi administrator
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="icon-contact text-sm sm:text-base">
                        <i class="fas fa-phone-alt"></i>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                <p class="text-[10px] sm:text-xs text-gray-400 leading-relaxed">
                    © 2024 Indonesia Drilling School. All rights reserved.
                </p>
                <p class="text-[10px] sm:text-xs text-gray-400 mt-1">
                    Powered by Advanced Training Solutions
                </p>
            </div>
        </div>

        <!-- Security Badge -->
        <div class="text-center mt-5">
            <div class="inline-flex items-center bg-white bg-opacity-20 backdrop-blur-sm px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">
                <i class="fas fa-shield-alt text-white mr-2 text-xs sm:text-sm"></i>
                <span class="text-white text-xs sm:text-sm font-medium">Secured Connection</span>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });

        // Form Validation & Submit
        const loginForm = document.getElementById('loginForm');
        const errorAlert = document.getElementById('errorAlert');
        const errorMessage = document.getElementById('errorMessage');

        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const remember = document.querySelector('input[name="remember"]').checked;

            // Clear previous errors
            errorAlert.classList.add('hidden');

            // Validation
            if (email === '') {
                showError('Email tidak boleh kosong');
                return false;
            }

            if (password === '') {
                showError('Password tidak boleh kosong');
                return false;
            }

            if (password.length < 6) {
                showError('Password minimal 6 karakter');
                return false;
            }

            // Disable button saat loading
            const submitBtn = loginForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';

            try {
                // Request ke API login
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    credentials: 'same-origin', // Penting untuk cookies
                    body: JSON.stringify({
                        email,
                        password,
                        remember
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    showError(data.message || 'Login gagal. Periksa email dan password Anda.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                    return;
                }

                // Login berhasil
                showSuccess('Login berhasil! Mengalihkan ke dashboard...');

                // Redirect ke dashboard setelah 1 detik
                setTimeout(() => {
                    window.location.href = '/articleadmin';
                }, 1000);

            } catch (error) {
                showError('Terjadi kesalahan koneksi. Silakan coba lagi.');
                console.error('Login error:', error);
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });

        function showError(message) {
            errorMessage.textContent = message;
            errorAlert.classList.remove('hidden');
            errorAlert.classList.remove('bg-green-50', 'border-green-500');
            errorAlert.classList.add('bg-red-50', 'border-red-500');
            errorAlert.querySelector('i').classList.remove('fa-check-circle', 'text-green-500');
            errorAlert.querySelector('i').classList.add('fa-exclamation-circle', 'text-red-500');
            errorAlert.querySelector('p').classList.remove('text-green-700');
            errorAlert.querySelector('p').classList.add('text-red-700');

            setTimeout(() => {
                errorAlert.classList.add('hidden');
            }, 5000);
        }

        function showSuccess(message) {
            errorMessage.textContent = message;
            errorAlert.classList.remove('hidden', 'bg-red-50', 'border-red-500');
            errorAlert.classList.add('bg-green-50', 'border-green-500');
            errorAlert.querySelector('i').classList.remove('fa-exclamation-circle', 'text-red-500');
            errorAlert.querySelector('i').classList.add('fa-check-circle', 'text-green-500');
            errorAlert.querySelector('p').classList.remove('text-red-700');
            errorAlert.querySelector('p').classList.add('text-green-700');
        }

        // Ripple effect
        const loginBtn = document.querySelector('.btn-login');
        loginBtn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    </script>
</body>

</html>