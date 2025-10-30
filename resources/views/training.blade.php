@extends('layouts.adminmain')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Program & Pelatihan</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola program & pelatihan</p>
                </div>
                <button onclick="openAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Program
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Provider -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Total Provider</p>
                        <p class="text-3xl font-bold text-slate-800 mt-1">{{ count($trainings) }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Terbaru -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Terbaru</p>
                        @php
                        $latestDate = collect($trainings)->max('created_at');
                        $formattedDate = $latestDate ? \Carbon\Carbon::parse($latestDate)->format('d M') : '-';
                        @endphp
                        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $formattedDate }}</p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-lg">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <div class="flex flex-wrap items-center gap-4">
                <!-- Pencarian Teks -->
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari provider atau pelatihan..."
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Dropdown Filter Provider -->
                <div class="min-w-[200px]">
                    <select
                        id="providerFilter"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <option value="">Semua Program</option>
                        @foreach($trainings as $training)
                        <option value="{{ $training['provider'] }}">{{ $training['provider'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Provider & Pelatihan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Provider</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Pelatihan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($trainings as $index => $training)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">{{ ($trainings->currentPage() - 1) * $trainings->perPage() + $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">{{ $training['provider'] }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                @if($training['trainings'] && count($training['trainings']) > 0)
                                <div
                                    id="trainings-container-{{ $index }}"
                                    class="space-y-1 max-h-32 overflow-hidden transition-all duration-300"
                                    style="max-height: {{ count($training['trainings']) <= 3 ? 'none' : '5rem' }};">
                                    @foreach($training['trainings'] as $t)
                                    <div class="flex items-center justify-between py-1 border-b border-slate-100 last:border-b-0">
                                        <span>{{ $t['name'] }}</span>
                                        <span class="text-xs text-slate-500">ID: {{ $t['id'] }}</span>
                                    </div>
                                    @endforeach
                                </div>

                                @if(count($training['trainings']) > 3)
                                <button
                                    type="button"
                                    onclick="toggleTrainings({{ $index }})"
                                    class="mt-2 text-xs text-purple-600 hover:text-purple-800 font-medium flex items-center">
                                    <span id="toggle-text-{{ $index }}">Lihat semua ({{ count($training['trainings']) }})</span>
                                    <svg
                                        id="toggle-icon-{{ $index }}"
                                        class="w-3 h-3 ml-1 transition-transform"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                @endif
                                @else
                                <span class="text-slate-500 italic">Tidak ada pelatihan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">{{ $training['created_at'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button onclick="openEditModal({{ json_encode($training) }})" class="text-blue-600 hover:text-blue-900 mr-3 transition" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="openDeleteModal({{ json_encode($training) }})" class="text-red-600 hover:text-red-900 transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-slate-500">Tidak ada data provider.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                @if($trainings->isNotEmpty())
                {{ $trainings->withQueryString()->links('pagination.custom') }}
                @else
                <!-- Fallback statis (opsional) -->
                <div class="flex items-center justify-between">
                    <div class="text-sm text-slate-600">
                        Menampilkan <span class="font-semibold">0</span> sampai <span class="font-semibold">0</span> dari <span class="font-semibold">0</span> data
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Provider & Pelatihan -->
<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform transition-all">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Tambah Program & Pelatihan</h3>
                <button onclick="closeAddModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Program *</label>
                <input
                    type="text"
                    required
                    placeholder="Contoh: AOSH, PT Safety Pro"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Pelatihan *</label>
                <!-- Kontainer input pelatihan dengan scroll vertikal -->
                <div id="trainingInputs" class="space-y-3 max-h-[60vh] overflow-y-auto pr-2">
                    <!-- Input pertama otomatis -->
                    <div class="flex items-center gap-2">
                        <input
                            type="text"
                            required
                            placeholder="Nama pelatihan (contoh: Basic Safety Induction)"
                            class="flex-1 px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <button type="button" onclick="removeTrainingInput(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="button" onclick="addTrainingInput()" class="mt-3 inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Pelatihan
                </button>
            </div>

            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="closeAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition shadow-lg">
                    Simpan Provider
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Provider & Pelatihan -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform transition-all">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit Program & Pelatihan</h3>
                <button onclick="closeEditModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="editForm" class="p-6 space-y-6">
            <input type="hidden" id="editId" name="id">

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Program *</label>
                <input
                    type="text"
                    id="editProvider"
                    name="provider"
                    required
                    placeholder="Contoh: AOSH, PT Safety Pro"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Pelatihan *</label>
                <!-- Kontainer input pelatihan dengan scroll vertikal -->
                <div id="editTrainingInputs" class="space-y-3 max-h-[60vh] overflow-y-auto pr-2">
                    <!-- Input akan diisi oleh JS -->
                </div>

                <button type="button" onclick="addEditTrainingInput()" class="mt-3 inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Pelatihan
                </button>
            </div>

            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition shadow-lg">
                    Update Provider
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
            <p class="text-slate-600 text-center mb-6">
                Apakah Anda yakin ingin menghapus program <span id="deleteProviderName" class="font-semibold text-slate-900"></span>? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                    Batal
                </button>
                <form id="deleteForm" method="POST" style="flex: 1;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteId" name="id">
                    <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition shadow-lg">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menambah input pelatihan di modal ADD
    function addTrainingInput() {
        const container = document.getElementById('trainingInputs');
        const newInput = document.createElement('div');
        newInput.className = 'flex items-center gap-2';
        newInput.innerHTML = `
            <input
                type="text"
                name="trainings[]"
                required
                placeholder="Nama pelatihan (contoh: Basic Safety Induction)"
                class="flex-1 px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
            >
            <button type="button" onclick="removeTrainingInput(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        `;
        container.appendChild(newInput);
    }

    // Fungsi untuk menghapus input pelatihan di modal ADD
    function removeTrainingInput(button) {
        button.parentElement.remove();
    }

    // Fungsi untuk membuka modal EDIT
    function openEditModal(data) {
        document.getElementById('editModal').classList.remove('hidden');

        // Isi form edit
        document.getElementById('editId').value = data.id || '';
        document.getElementById('editProvider').value = data.provider || '';

        // Kosongkan container edit
        const container = document.getElementById('editTrainingInputs');
        container.innerHTML = '';

        // Tambahkan setiap pelatihan
        if (data.trainings && Array.isArray(data.trainings)) {
            data.trainings.forEach((training, index) => {
                const newInput = document.createElement('div');
                newInput.className = 'flex items-center gap-2';
                newInput.innerHTML = `
                    <input
                        type="text"
                        name="trainings[${index}]"
                        required
                        value="${training.name || ''}"
                        placeholder="Nama pelatihan"
                        class="flex-1 px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                    >
                    <button type="button" onclick="removeEditTrainingInput(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                container.appendChild(newInput);
            });
        }
    }

    // Fungsi untuk menambah input pelatihan di modal EDIT
    function addEditTrainingInput() {
        const container = document.getElementById('editTrainingInputs');
        const index = container.children.length;
        const newInput = document.createElement('div');
        newInput.className = 'flex items-center gap-2';
        newInput.innerHTML = `
            <input
                type="text"
                name="trainings[${index}]"
                required
                placeholder="Nama pelatihan (contoh: Basic Safety Induction)"
                class="flex-1 px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
            >
            <button type="button" onclick="removeEditTrainingInput(this)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        `;
        container.appendChild(newInput);
    }

    // Fungsi untuk menghapus input pelatihan di modal EDIT
    function removeEditTrainingInput(button) {
        button.parentElement.remove();
    }

    // Fungsi untuk menutup modal
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');

    }
    // Fungsi untuk membuka modal hapus
    function openDeleteModal(data) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteId').value = data.id || '';
        document.getElementById('deleteProviderName').textContent = data.provider || 'ini';

        // Atur action form sesuai route Laravel Anda
        const form = document.getElementById('deleteForm');
        form.action = `/admin/trainings/${data.id}`; // Sesuaikan dengan route Anda
    }

    // Fungsi untuk menutup modal hapus
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Tutup modal jika klik di luar konten (opsional, seperti di view user)
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) this.classList.add('hidden');
        });
    });
    // Fungsi untuk toggle tampilan daftar pelatihan
    function toggleTrainings(index) {
        const container = document.getElementById(`trainings-container-${index}`);
        const isExpanded = container.style.maxHeight === 'none' || container.style.maxHeight === '';

        if (isExpanded) {
            // Sembunyikan
            container.style.maxHeight = '5rem'; // ~3 item
            document.getElementById(`toggle-text-${index}`).textContent = `Lihat semua (${container.children.length})`;
            document.getElementById(`toggle-icon-${index}`).style.transform = 'rotate(0deg)';
        } else {
            // Tampilkan semua
            container.style.maxHeight = 'none';
            document.getElementById(`toggle-text-${index}`).textContent = 'Sembunyikan';
            document.getElementById(`toggle-icon-${index}`).style.transform = 'rotate(180deg)';
        }
    }
</script>
@endsection