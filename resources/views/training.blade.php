@extends('layouts.adminmain')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Program & Pelatihan</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola program & pelatihan berdasarkan kategori</p>
                </div>
                <button onclick="openAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Program
                </button>
            </div>
        </div>

        <!-- Stats Cards - Updated with Category Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Kategori -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Kategori</p>
                        @php
                        $categories = collect($trainings)->pluck('category')->unique()->filter();
                        @endphp
                        <p class="text-3xl font-bold text-slate-800">{{ $categories->count() }}</p>
                        <p class="text-xs text-slate-500 mt-1">Kategori program</p>
                    </div>
                    <div class="p-3 bg-indigo-100 rounded-lg">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Provider -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Program</p>
                        <p class="text-3xl font-bold text-slate-800">{{ count($trainings) }}</p>
                        <p class="text-xs text-slate-500 mt-1">Program aktif</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Pelatihan -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Pelatihan</p>
                        @php
                        $totalTrainings = collect($trainings)->sum(function($training) {
                        return count($training['trainings'] ?? []);
                        });
                        @endphp
                        <p class="text-3xl font-bold text-slate-800">{{ $totalTrainings }}</p>
                        <p class="text-xs text-slate-500 mt-1">Jenis pelatihan</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Kategori Terbanyak -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Kategori Terbanyak</p>
                        @php
                        $grouped = collect($trainings)->groupBy('category');
                        $topCategory = $grouped->sortByDesc(function ($items) {
                        return $items->count();
                        })->keys()->first();
                        $categoryCount = $topCategory ? $grouped->get($topCategory)->count() : 0;
                        @endphp
                        <p class="text-3xl font-bold text-slate-800">{{ $categoryCount }}</p>
                        <p class="text-xs text-slate-500 mt-1 truncate">{{ $topCategory ?? 'Belum ada' }}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
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
                            placeholder="Cari program atau pelatihan..."
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Dropdown Filter Kategori -->
                <div class="min-w-[200px]">
                    <select
                        id="categoryFilter"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <option value="">Semua Kategori</option>
                        @php
                        $uniqueCategories = collect($trainings)->pluck('category')->unique()->filter()->sort();
                        @endphp
                        @foreach($uniqueCategories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
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
                <div class="min-w-[150px]">
                    <select
                        id="statusFilter"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <option value="">Semua Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Program & Pelatihan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-12">No</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-32">Kategori</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-48">Program</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Pelatihan</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-24">Status</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-28">Aktif/Total</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-28">Tanggal</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-20">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($trainings as $index => $training)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-700 font-medium">
                                {{ ($trainings->currentPage() - 1) * $trainings->perPage() + $index + 1 }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800">
                                    {{ $training['category'] ?? 'Tidak ada kategori' }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-9 w-9 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold text-xs">{{ strtoupper(substr($training['provider'], 0, 2)) }}</span>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-semibold text-slate-900">{{ $training['provider'] }}</div>
                                        <div class="text-xs text-slate-500">
                                            {{ count($training['trainings'] ?? []) }} pelatihan
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                @if($training['trainings'] && count($training['trainings']) > 0)
                                <div class="relative">
                                    <button
                                        type="button"
                                        onclick="toggleDropdown({{ $index }})"
                                        class="w-full flex items-center justify-between px-3 py-2.5 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-lg border border-purple-200 transition-all duration-200">
                                        <div class="flex items-center gap-2">
                                            <div class="h-7 w-7 rounded-full bg-purple-500 flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-bold text-xs">{{ count($training['trainings']) }}</span>
                                            </div>
                                            <div class="text-left">
                                                <p class="text-sm font-semibold text-slate-800">{{ count($training['trainings']) }} Pelatihan</p>
                                            </div>
                                        </div>
                                        <svg
                                            id="dropdown-icon-{{ $index }}"
                                            class="w-5 h-5 text-purple-600 transition-transform duration-200 flex-shrink-0"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div
                                        id="dropdown-menu-{{ $index }}"
                                        class="hidden absolute z-10 mt-2 w-full min-w-[300px] bg-white rounded-lg shadow-xl border border-slate-200 max-h-80 overflow-y-auto">
                                        <div class="p-2">
                                            @foreach($training['trainings'] as $tIndex => $t)
                                            <div class="flex items-start gap-3 p-3 hover:bg-slate-50 rounded-lg transition-colors group">
                                                <div class="flex-shrink-0 mt-0.5">
                                                    <div class="h-7 w-7 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center shadow-sm">
                                                        <span class="text-white font-bold text-xs">{{ $tIndex + 1 }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-semibold text-slate-900 leading-tight group-hover:text-purple-600 transition-colors">
                                                        {{ $t['name'] }}
                                                    </p>
                                                    @if(!empty($t['description']))
                                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $t['description'] }}</p>
                                                    @endif
                                                </div>
                                                <div class="flex-shrink-0 mt-0.5">
                                                    @if(($t['status'] ?? 'active') === 'active')
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Active
                                                    </span>
                                                    @else
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Inactive
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            @if($tIndex < count($training['trainings']) - 1)
                                                <div class="border-b border-slate-100 my-1">
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
            </div>
            @else
            <div class="flex items-center gap-2 text-slate-400 text-sm italic px-3 py-2 bg-slate-50 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                Tidak ada
            </div>
            @endif
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-center">
                @if(($training['status'] ?? 'active') === 'active')
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                    Active
                </span>
                @else
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                    Inactive
                </span>
                @endif
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-center">
                <span class="text-sm font-semibold text-slate-900">
                    {{ collect($training['trainings'] ?? [])->where('status', 'active')->count() }}
                </span>
                <span class="text-sm text-slate-500">/ {{ count($training['trainings'] ?? []) }}</span>
            </td>
            <td class="px-4 py-4 whitespace-nowrap">
                <div class="text-sm text-slate-900">{{ \Carbon\Carbon::parse($training['created_at'])->format('d M Y') }}</div>
                <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($training['created_at'])->format('H:i') }}</div>
            </td>
            <td class="px-4 py-4 whitespace-nowrap">
                <div class="flex items-center justify-center gap-1">
                    <button onclick='openEditModal({{ json_encode($training, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }})' class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                    <button onclick='openDeleteModal({{ json_encode($training, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }})' class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-6 py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <p class="mt-2 text-sm text-slate-500">Tidak ada data program.</p>
                </td>
            </tr>
            @endforelse
            </tbody>
            </table>
        </div>
        <div class="bg-white px-6 py-4 border-t border-slate-200">
            @if($trainings->isNotEmpty())
            {{ $trainings->withQueryString()->links('pagination.custom') }}
            @else
            <div class="flex items-center justify-between">
                <div class="text-sm text-slate-600">
                    Menampilkan <span class="font-semibold">0</span> sampai <span class="font-semibold">0</span> dari <span class="font-semibold">0</span> data
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Modal Tambah Provider & Pelatihan -->
    <!-- Modal Tambah Provider & Pelatihan -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform transition-all max-h-[90vh] flex flex-col">
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl flex-shrink-0">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Tambah Program & Pelatihan</h3>
                    <button onclick="closeAddModal()" class="text-white hover:text-slate-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <form class="p-6 space-y-6 overflow-y-auto flex-1" method="POST" action="#" onsubmit="alert('Fitur ini belum aktif (preview UI saja).'); return false;">
                @csrf
                <!-- Kategori Program -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori Program *</label>
                    <select
                        name="category"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        <option value="Keselamatan Kerja">Keselamatan Kerja</option>
                        <option value="Teknik & Operasional">Teknik & Operasional</option>
                        <option value="Manajemen & Leadership">Manajemen & Leadership</option>
                        <option value="Sertifikasi Profesional">Sertifikasi Profesional</option>
                    </select>
                    <p class="mt-1 text-xs text-slate-500">Pilih kategori yang sesuai dengan jenis program pelatihan</p>
                </div>

                <!-- Nama Program -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Program *</label>
                    <input
                        type="text"
                        name="provider"
                        required
                        placeholder="Contoh: AOSH, PT Safety Pro"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-slate-500">Masukkan nama program atau lembaga penyelenggara pelatihan</p>
                </div>

                <!-- Status Provider -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Program *</label>
                    <select
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <p class="mt-1 text-xs text-slate-500">Status aktifitas program ini</p>
                </div>

                <!-- Deskripsi Program -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Program</label>
                    <textarea
                        name="provider_description"
                        rows="3"
                        placeholder="Deskripsi singkat tentang program atau program ini"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"></textarea>
                </div>

                <!-- Daftar Pelatihan -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Pelatihan *</label>
                    <p class="text-xs text-slate-500 mb-3">Tambahkan jenis pelatihan yang disediakan oleh program ini</p>
                    <div id="trainingInputs" class="space-y-3 max-h-[40vh] overflow-y-auto pr-2">
                        <!-- Input pertama -->
                        <div class="flex flex-col gap-2 p-4 bg-slate-50 rounded-lg border border-slate-200">
                            <div class="flex items-start gap-2">
                                <input
                                    type="text"
                                    name="trainings[0][name]"
                                    required
                                    placeholder="Nama pelatihan (contoh: Basic Safety Induction)"
                                    class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                                <select
                                    name="trainings[0][status]"
                                    class="w-28 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <button type="button" onclick="removeTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <textarea
                                name="trainings[0][description]"
                                rows="2"
                                placeholder="Deskripsi pelatihan ini (opsional)"
                                class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm"></textarea>
                        </div>
                    </div>
                    <button type="button" onclick="addTrainingInput()" class="mt-3 inline-flex items-center px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Pelatihan
                    </button>
                </div>

                <div class="flex space-x-3 pt-4 border-t border-slate-200 flex-shrink-0">
                    <button type="button" onclick="closeAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition shadow-lg">
                        Simpan Program
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Provider & Pelatihan -->
    <!-- Modal Edit Provider & Pelatihan -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform transition-all max-h-[90vh] flex flex-col">
            <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl flex-shrink-0">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Edit Program & Pelatihan</h3>
                    <button onclick="closeEditModal()" class="text-white hover:text-slate-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <form id="editForm" class="p-6 space-y-6 overflow-y-auto flex-1" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editId" name="id">

                <!-- Kategori Program -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori Program *</label>
                    <select
                        id="editCategory"
                        name="category"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        <option value="Keselamatan Kerja">Keselamatan Kerja</option>
                        <option value="Teknik & Operasional">Teknik & Operasional</option>
                        <option value="Manajemen & Leadership">Manajemen & Leadership</option>
                        <option value="Sertifikasi Profesional">Sertifikasi Profesional</option>
                    </select>
                    <p class="mt-1 text-xs text-slate-500">Pilih kategori yang sesuai dengan jenis program pelatihan</p>
                </div>

                <!-- Nama Program -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Program *</label>
                    <input
                        type="text"
                        id="editProvider"
                        name="provider"
                        required
                        placeholder="Contoh: AOSH, PT Safety Pro"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-slate-500">Masukkan nama program atau lembaga penyelenggara pelatihan</p>
                </div>

                <!-- Status Provider -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Program *</label>
                    <select
                        id="editProviderStatus"
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <p class="mt-1 text-xs text-slate-500">Status aktifitas program ini</p>
                </div>

                <!-- Deskripsi Program -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Program</label>
                    <textarea
                        id="editProviderDescription"
                        name="provider_description"
                        rows="3"
                        placeholder="Deskripsi singkat tentang program atau provider ini"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none"></textarea>
                    <p class="mt-1 text-xs text-slate-500">Opsional. Jelaskan latar belakang, fokus, atau keunggulan program.</p>
                </div>

                <!-- Daftar Pelatihan -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Pelatihan *</label>
                    <p class="text-xs text-slate-500 mb-3">Edit atau tambahkan jenis pelatihan yang disediakan</p>
                    <div id="editTrainingInputs" class="space-y-3 max-h-[40vh] overflow-y-auto pr-2">
                        <!-- Input akan diisi oleh JS -->
                    </div>
                    <button type="button" onclick="addEditTrainingInput()" class="mt-3 inline-flex items-center px-4 py-2 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Pelatihan
                    </button>
                </div>

                <div class="flex space-x-3 pt-4 border-t border-slate-200 flex-shrink-0">
                    <button type="button" onclick="closeEditModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition shadow-lg">
                        Update Program
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
            const index = container.children.length;
            const newInput = document.createElement('div');
            newInput.className = 'flex flex-col gap-2 p-4 bg-slate-50 rounded-lg border border-slate-200';
            newInput.innerHTML = `
        <div class="flex items-start gap-2">
            <input
                type="text"
                name="trainings[${index}][name]"
                required
                placeholder="Nama pelatihan (contoh: Basic Safety Induction)"
                class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
            <select
                name="trainings[${index}][status]"
                class="w-28 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <button type="button" onclick="removeTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <textarea
            name="trainings[${index}][description]"
            rows="2"
            placeholder="Deskripsi pelatihan ini (opsional)"
            class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm"></textarea>
    `;
            container.appendChild(newInput);
        }

        function removeTrainingInput(button) {
            const container = document.getElementById('trainingInputs');
            if (container.children.length > 1) {
                button.closest('div.flex.flex-col.gap-2').remove();
            } else {
                alert('Minimal harus ada satu pelatihan!');
            }
        }

        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(data) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editId').value = data.id || '';
            document.getElementById('editProvider').value = data.provider || '';
            document.getElementById('editCategory').value = data.category || '';
            document.getElementById('editProviderDescription').value = data.provider_description || '';
            document.getElementById('editProviderStatus').value = data.status || 'active';

            const form = document.getElementById('editForm');
            form.action = "#";
            form.onsubmit = function(e) {
                e.preventDefault();
                alert('Fitur edit belum aktif (preview UI saja).');
            };

            const container = document.getElementById('editTrainingInputs');
            container.innerHTML = '';

            if (data.trainings && Array.isArray(data.trainings)) {
                data.trainings.forEach((training, index) => {
                    const newInput = document.createElement('div');
                    newInput.className = 'flex flex-col gap-2 p-4 bg-slate-50 rounded-lg border border-slate-200';
                    newInput.innerHTML = `
                <div class="flex items-start gap-2">
                    <input
                        type="text"
                        name="trainings[${index}][name]"
                        required
                        value="${(training.name || '').replace(/"/g, '&quot;')}"
                        placeholder="Nama pelatihan"
                        class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                    <select
                        name="trainings[${index}][status]"
                        class="w-28 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                        <option value="active" ${(training.status || 'active') === 'active' ? 'selected' : ''}>Active</option>
                        <option value="inactive" ${(training.status || 'active') === 'inactive' ? 'selected' : ''}>Inactive</option>
                    </select>
                    <button type="button" onclick="removeEditTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <textarea
                    name="trainings[${index}][description]"
                    rows="2"
                    placeholder="Deskripsi pelatihan ini (opsional)"
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm">${(training.description || '').replace(/"/g, '&quot;')}</textarea>
            `;
                    container.appendChild(newInput);
                });
            }
        }

        function addEditTrainingInput() {
            const container = document.getElementById('editTrainingInputs');
            const index = container.children.length;
            const newInput = document.createElement('div');
            newInput.className = 'flex flex-col gap-2 p-4 bg-slate-50 rounded-lg border border-slate-200';
            newInput.innerHTML = `
        <div class="flex items-start gap-2">
            <input
                type="text"
                name="trainings[${index}][name]"
                required
                placeholder="Nama pelatihan"
                class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
            <select
                name="trainings[${index}][status]"
                class="w-28 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <button type="button" onclick="removeEditTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <textarea
            name="trainings[${index}][description]"
            rows="2"
            placeholder="Deskripsi pelatihan ini (opsional)"
            class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm"></textarea>
    `;
            container.appendChild(newInput);
        }

        function removeEditTrainingInput(button) {
            const container = document.getElementById('editTrainingInputs');
            if (container.children.length > 1) {
                button.closest('div.flex.flex-col.gap-2').remove();
            } else {
                alert('Minimal harus ada satu pelatihan!');
            }
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openDeleteModal(data) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteId').value = data.id || '';
            document.getElementById('deleteProviderName').textContent = data.provider || 'ini';
            const form = document.getElementById('deleteForm');
            form.action = "#";
            form.onsubmit = function(e) {
                e.preventDefault();
                alert('Fitur hapus belum aktif (preview UI saja).');
            };
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.querySelectorAll('[id$="Modal"]').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) this.classList.add('hidden');
            });
        });

        function toggleDropdown(index) {
            const menu = document.getElementById(`dropdown-menu-${index}`);
            const icon = document.getElementById(`dropdown-icon-${index}`);

            // Close all other dropdowns
            document.querySelectorAll('[id^="dropdown-menu-"]').forEach(dropdown => {
                if (dropdown.id !== `dropdown-menu-${index}`) {
                    dropdown.classList.add('hidden');
                }
            });
            document.querySelectorAll('[id^="dropdown-icon-"]').forEach(dropdownIcon => {
                if (dropdownIcon.id !== `dropdown-icon-${index}`) {
                    dropdownIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current dropdown
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('[onclick^="toggleDropdown"]') && !event.target.closest('[id^="dropdown-menu-"]')) {
                document.querySelectorAll('[id^="dropdown-menu-"]').forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
                document.querySelectorAll('[id^="dropdown-icon-"]').forEach(icon => {
                    icon.style.transform = 'rotate(0deg)';
                });
            }
        });

        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const providerFilter = document.getElementById('providerFilter');
            const statusFilter = document.getElementById('statusFilter');
            const tableRows = document.querySelectorAll('tbody tr:not(:last-child)');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value.toLowerCase();
                const selectedProvider = providerFilter.value.toLowerCase();
                const selectedStatus = statusFilter.value.toLowerCase();

                tableRows.forEach(row => {
                    const categoryCell = row.querySelector('td:nth-child(2)');
                    const providerCell = row.querySelector('td:nth-child(3)');
                    const trainingCell = row.querySelector('td:nth-child(4)');
                    const statusCell = row.querySelector('td:nth-child(5)');

                    if (!categoryCell || !providerCell || !trainingCell || !statusCell) return;

                    const category = categoryCell.textContent.toLowerCase();
                    const provider = providerCell.textContent.toLowerCase();
                    const training = trainingCell.textContent.toLowerCase();
                    const status = statusCell.textContent.toLowerCase();

                    const matchesSearch = !searchTerm ||
                        provider.includes(searchTerm) ||
                        training.includes(searchTerm);
                    const matchesCategory = !selectedCategory || category.includes(selectedCategory);
                    const matchesProvider = !selectedProvider || provider.includes(selectedProvider);
                    const matchesStatus = !selectedStatus || status.includes(selectedStatus);

                    if (matchesSearch && matchesCategory && matchesProvider && matchesStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterTable);
            categoryFilter.addEventListener('change', filterTable);
            providerFilter.addEventListener('change', filterTable);
            statusFilter.addEventListener('change', filterTable);
        });
    </script>
</div>
@endsection