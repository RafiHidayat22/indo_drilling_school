<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800"><?php echo e($pageTitle); ?></h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola pengguna dan hak akses sistem</p>
                </div>
                <button onclick="openAddUserModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah User
                </button>
            </div>
        </div>

        <!-- Alert Messages -->
        <div id="alertMessage" class="hidden mb-6"></div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Total Users</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($totalUsers); ?></p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Active Users</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($activeUsers); ?></p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-amber-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Admin Users</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($adminUsers); ?></p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-full">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Daftar User</h2>
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari user..." class="pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal Dibuat</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $userItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                <?php echo e($users->firstItem() + $index); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        <?php echo e(strtoupper(substr($userItem->username, 0, 2))); ?>

                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-slate-900"><?php echo e($userItem->username); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700"><?php echo e($userItem->email); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php if($userItem->role === 'superAdmin'): ?> bg-purple-100 text-purple-800
                                    <?php elseif($userItem->role === 'admin'): ?> bg-blue-100 text-blue-800
                                    <?php else: ?> bg-slate-100 text-slate-800 <?php endif; ?>">
                                    <?php echo e($userItem->role === 'superAdmin' ? 'Super Admin' : 'Admin'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php if($userItem->status === 'Active'): ?> bg-green-100 text-green-800
                                    <?php else: ?> bg-red-100 text-red-800 <?php endif; ?>">
                                    <?php echo e($userItem->status); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                <?php echo e($userItem->created_at->format('d M Y')); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <?php if($userItem->id !== $user->id): ?>
                                <button onclick="openEditUserModal(<?php echo e($userItem->id); ?>)" class="text-blue-600 hover:text-blue-900 mr-3 transition">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="confirmUserDelete(<?php echo e($userItem->id); ?>, '<?php echo e($userItem->username); ?>')" class="text-red-600 hover:text-red-900 transition">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                <?php else: ?>
                                <span class="text-xs text-slate-400">Current User</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-slate-500">Tidak ada user ditemukan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                <?php if($users->isNotEmpty()): ?>
                <?php echo e($users->links()); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah User -->
<div id="addModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Tambah User Baru</h3>
                <button onclick="closeAddUserModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="addUserForm" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Username</label>
                <input type="text" name="username" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Masukkan username">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Masukkan email">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Masukkan password (min. 8 karakter)">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Role</label>
                <select name="role" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    <option value="admin">Admin</option>
                    <option value="superAdmin">Super Admin</option>
                </select>
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="button" onclick="closeAddUserModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition duration-200 shadow-lg hover:shadow-xl">Simpan User</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit User -->
<div id="editModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit User</h3>
                <button onclick="closeEditUserModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="editUserForm" class="p-6 space-y-4">
            <input type="hidden" name="user_id" id="edit_user_id">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Username</label>
                <input type="text" name="username" id="edit_username" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                <input type="email" name="email" id="edit_email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="edit_password" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition" placeholder="Masukkan password baru">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Role</label>
                <select name="role" id="edit_role" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                    <option value="admin">Admin</option>
                    <option value="superAdmin">Super Admin</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Status</label>
                <select name="status" id="edit_status" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="button" onclick="closeEditUserModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
            <p class="text-slate-600 text-center mb-6">Apakah Anda yakin ingin menghapus user <strong id="delete_username"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            <input type="hidden" id="delete_user_id">
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteUserModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="button" onclick="deleteUser()" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    const API_BASE_URL = '/api';
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // GLOBAL VARIABLE untuk store user yang akan dihapus
    let userToDelete = null;

    // Show alert message
    function showAlert(message, type = 'success') {
        const alertDiv = document.getElementById('alertMessage');
        const bgColor = type === 'success' ? 'bg-green-100 border-green-500 text-green-700' : 'bg-red-100 border-red-500 text-red-700';
        const icon = type === 'success' ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z';

        alertDiv.className = `${bgColor} border-l-4 p-4 rounded-lg mb-6`;
        alertDiv.innerHTML = `
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${icon}" />
                </svg>
                <p class="font-medium">${message}</p>
            </div>
        `;
        alertDiv.classList.remove('hidden');

        setTimeout(() => {
            alertDiv.classList.add('hidden');
        }, 5000);
    }

    function openAddUserModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddUserModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.getElementById('addUserForm').reset();
    }

    function openEditUserModal(id) {
        fetch(`${API_BASE_URL}/users/${id}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('edit_user_id').value = data.data.id;
                    document.getElementById('edit_username').value = data.data.username;
                    document.getElementById('edit_email').value = data.data.email;
                    document.getElementById('edit_role').value = data.data.role;
                    document.getElementById('edit_status').value = data.data.status;
                    document.getElementById('editModal').classList.remove('hidden');
                }
            })
            .catch(error => {
                showAlert('Gagal memuat data user', 'error');
                console.error('Error:', error);
            });
    }

    function closeEditUserModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editUserForm').reset();
    }

    function confirmUserDelete(id, username) {
        console.log('=== CONFIRM DELETE ===');
        console.log('ID:', id, 'Username:', username);

        // Store ke global variable
        userToDelete = {
            id: String(id),
            username: username
        };

        console.log('User to delete stored:', userToDelete);

        // Update UI
        document.getElementById('delete_username').textContent = username;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteUserModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        userToDelete = null;
    }

    async function deleteUser() {
        console.log('=== DELETE USER ===');
        console.log('Global userToDelete:', userToDelete);

        if (!userToDelete || !userToDelete.id) {
            console.error('❌ User data not found!');
            showAlert('User ID tidak valid. Silakan coba lagi.', 'error');
            closeDeleteModal();
            return;
        }

        const userId = userToDelete.id;
        const url = `${API_BASE_URL}/users/${userId}`;

        console.log('DELETE URL:', url);
        console.log('User ID:', userId);

        try {
            const response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            });

            console.log('Response status:', response.status);

            const result = await response.json();
            console.log('Response data:', result);

            if (response.ok && result.success) {
                showAlert('User berhasil dihapus!', 'success');
                closeDeleteModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                showAlert(result.message || 'Gagal menghapus user', 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan saat menghapus user', 'error');
            console.error('Delete error:', error);
        }
    }

    // Add User
    document.getElementById('addUserForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData);

        try {
            const response = await fetch(`${API_BASE_URL}/users`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                credentials: 'same-origin',
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                showAlert('User berhasil ditambahkan!', 'success');
                closeAddModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                const errorMsg = result.errors ? Object.values(result.errors).flat().join(', ') : result.message;
                showAlert(errorMsg, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan saat menambah user', 'error');
            console.error('Error:', error);
        }
    });

    // Update User
    document.getElementById('editUserForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const userId = document.getElementById('edit_user_id').value;
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        delete data.user_id;

        if (!data.password) {
            delete data.password;
        }

        try {
            const response = await fetch(`${API_BASE_URL}/users/${userId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                credentials: 'same-origin',
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                showAlert('User berhasil diupdate!', 'success');
                closeEditModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                const errorMsg = result.errors ? Object.values(result.errors).flat().join(', ') : result.message;
                showAlert(errorMsg, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan saat update user', 'error');
            console.error('Error:', error);
        }
    });


    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views/users.blade.php ENDPATH**/ ?>