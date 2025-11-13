@extends('layouts.adminmain')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Project Management</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola portfolio project dan case study</p>
                </div>
                <button onclick="adminProjectOpenAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-lg shadow-lg hover:from-red-700 hover:to-red-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Project
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Total Projects</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['total'] }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Published</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['published'] }}</p>
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
                        <p class="text-sm font-medium text-slate-600">Draft</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['draft'] }}</p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-full">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Ongoing</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['ongoing'] }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-cyan-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Completed</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['completed'] }}</p>
                    </div>
                    <div class="p-3 bg-cyan-100 rounded-full">
                        <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Featured</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['featured'] }}</p>
                    </div>
                    <div class="p-3 bg-pink-100 rounded-full">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <form method="GET" action="{{ route('admin.projects.index') }}" class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari project..." class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <select name="category" class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <option value="drilling" {{ request('category') == 'drilling' ? 'selected' : '' }}>Drilling</option>
                    <option value="safety" {{ request('category') == 'safety' ? 'selected' : '' }}>Safety</option>
                    <option value="certification" {{ request('category') == 'certification' ? 'selected' : '' }}>Certification</option>
                </select>
                <select name="status" class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <button type="submit" class="px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm font-medium">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2.5 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition text-sm font-medium">
                    Reset
                </a>
                @endif
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Project</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Project</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Client</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Order</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($projects as $index => $project)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                {{ ($projects->currentPage() - 1) * $projects->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($project->featured_image)
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-16 h-16 object-cover rounded-lg mr-3">
                                    @else
                                    <div class="w-16 h-16 bg-slate-200 rounded-lg mr-3 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    @endif
                                    <div>
                                        <div class="text-sm font-medium text-slate-900 max-w-xs truncate">{{ $project->title }}</div>
                                        <div class="flex gap-2 mt-1">
                                            @if($project->is_featured)
                                            <span class="px-2 py-0.5 bg-pink-100 text-pink-800 text-xs rounded-full font-medium">Featured</span>
                                            @endif
                                            @if($project->is_published)
                                            <span class="px-2 py-0.5 bg-green-100 text-green-800 text-xs rounded-full font-medium">Published</span>
                                            @else
                                            <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-xs rounded-full font-medium">Draft</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                {{ $project->client ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->category)
                                <span class="{{ $project->category_badge_color }} px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ ucfirst($project->category) }}
                                </span>
                                @else
                                <span class="text-slate-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="{{ $project->status_badge_color }} px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                {{ $project->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="text-slate-600 hover:text-slate-900 mr-3 transition" title="View">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <button onclick="adminProjectEditProject({{ $project->id }})" class="text-blue-600 hover:text-blue-900 mr-3 transition" title="Edit">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="adminProjectDeleteProject({{ $project->id }})" class="text-red-600 hover:text-red-900 transition" title="Delete">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-slate-500 text-lg font-medium">Tidak ada project ditemukan</p>
                                    <p class="text-slate-400 text-sm mt-1">Silakan tambah project baru atau ubah filter pencarian</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                @if($projects->hasPages())
                {{ $projects->withQueryString()->links('pagination.custom') }}
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Project -->
<div id="addModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-start justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto my-8">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Tambah Project Baru</h3>
                <button onclick="adminProjectCloseAddModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="addProjectForm" class="p-6 space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Project *</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Client</label>
                    <input type="text" name="client" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Lokasi</label>
                    <input type="text" name="location" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Selesai</label>
                    <input type="date" name="end_date" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                        <option value="">Pilih Kategori</option>
                        <option value="drilling">Drilling</option>
                        <option value="safety">Safety</option>
                        <option value="certification">Certification</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status *</label>
                    <select name="status" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                        <option value="ongoing">Ongoing</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Order</label>
                    <input type="number" name="order" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Project *</label>
                    <textarea name="description" required rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Challenges</label>
                    <textarea name="challenges" rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Solutions</label>
                    <textarea name="solutions" rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Results & Impact</label>
                    <textarea name="results" rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Featured Image</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="featuredImageAdd" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">
                            <img id="featuredImagePreviewAdd" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview">
                            <div id="featuredImagePlaceholderAdd" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload image</span></p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="featuredImageAdd" name="featured_image" class="hidden" accept="image/*" onchange="previewFeaturedImage('Add')" />
                        </label>
                    </div>
                </div>
<div class="md:col-span-2">
    <label class="block text-sm font-semibold text-slate-700 mb-2">Gallery Images</label>
    <div id="galleryPreviewAdd" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3 mb-3"></div>
    <div class="flex items-center space-x-3 mb-3">
        <button type="button" onclick="document.getElementById('galleryInputAdd').click()" class="inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition text-sm font-medium">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Gambar
        </button>
        <input type="file" id="galleryInputAdd" name="gallery_images[]" multiple accept="image/*" class="hidden" onchange="previewNewGallery('Add')">
    </div>
    <p class="text-xs text-slate-500">Pilih gambar untuk ditambahkan ke gallery. Anda bisa menambahkan beberapa gambar sekaligus.</p>
</div>
                <div class="md:col-span-2 flex items-center space-x-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" class="w-4 h-4 text-red-600 border-slate-300 rounded focus:ring-red-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Featured Project</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_published" class="w-4 h-4 text-red-600 border-slate-300 rounded focus:ring-red-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Publish</span>
                    </label>
                </div>
            </div>
            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="adminProjectCloseAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition duration-200">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition duration-200 shadow-lg hover:shadow-xl">
                    Simpan Project
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Project -->
<div id="editModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-start justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto my-8">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit Project</h3>
                <button onclick="closeEditModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="adminProjectEditProjectForm" class="p-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="adminProjectEditProjectId" name="project_id">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Project *</label>
                    <input type="text" id="editTitle" name="title" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Client</label>
                    <input type="text" id="editClient" name="client" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Lokasi</label>
                    <input type="text" id="editLocation" name="location" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Mulai</label>
                    <input type="date" id="editStartDate" name="start_date" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Selesai</label>
                    <input type="date" id="editEndDate" name="end_date" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                    <select id="editCategory" name="category" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                        <option value="">Pilih Kategori</option>
                        <option value="drilling">Drilling</option>
                        <option value="safety">Safety</option>
                        <option value="certification">Certification</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status *</label>
                    <select id="editStatus" name="status" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                        <option value="ongoing">Ongoing</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Order</label>
                    <input type="number" id="editOrder" name="order" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Project *</label>
                    <textarea id="editDescription" name="description" required rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Challenges</label>
                    <textarea id="editChallenges" name="challenges" rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Solutions</label>
                    <textarea id="editSolutions" name="solutions" rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Results & Impact</label>
                    <textarea id="editResults" name="results" rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Featured Image</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="featuredImageEdit" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">
                            <img id="featuredImagePreviewEdit" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview">
                            <div id="featuredImagePlaceholderEdit" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload new image</span></p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="featuredImageEdit" name="featured_image" class="hidden" accept="image/*" onchange="previewFeaturedImage('Edit')" />
                        </label>
                    </div>
                </div>

<div class="md:col-span-2">
    <label class="block text-sm font-semibold text-slate-700 mb-2">Gallery Images</label>
    <!-- Preview Existing Images -->
    <div id="galleryPreviewEdit" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3 mb-3">
        @if(isset($project) && $project->gallery_images)
            @foreach($project->gallery_images as $image)
                <div class="relative group">
                    <img src="{{ asset('storage/' . $image) }}" class="w-full h-20 object-cover rounded-lg border border-slate-200">
<button type="button" 
        onclick="removeExistingGalleryImage(this, '{{ $image }}', {{ $project->id ?? 'null' }})" 
        class="absolute -top-2 -right-2 ...">
    ×
</button>>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Add New Images -->
    <div class="flex items-center space-x-3 mb-3">
        <button type="button" onclick="document.getElementById('galleryInputEdit').click()" class="inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition text-sm font-medium">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Gambar
        </button>
        <input type="file" id="galleryInputEdit" name="gallery_images[]" multiple accept="image/*" class="hidden" onchange="previewNewGallery('Edit')">
    </div>
    <p class="text-xs text-slate-500">Gambar baru akan ditambahkan ke gallery. Untuk hapus gambar, klik tombol ×.</p>
</div>

                <div class="md:col-span-2 flex items-center space-x-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" id="editIsFeatured" name="is_featured" class="w-4 h-4 text-amber-600 border-slate-300 rounded focus:ring-amber-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Featured Project</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" id="editIsPublished" name="is_published" class="w-4 h-4 text-amber-600 border-slate-300 rounded focus:ring-amber-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Publish</span>
                    </label>
                </div>
            </div>

            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition duration-200">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition duration-200 shadow-lg hover:shadow-xl">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
            <p class="text-slate-600 text-center mb-6">Apakah Anda yakin ingin menghapus project ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Modal Functions
    function adminProjectOpenAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        document.getElementById('addProjectForm').reset();
        resetFeaturedImagePreview('Add');
    }

    function adminProjectCloseAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.getElementById('addProjectForm').reset();
        resetFeaturedImagePreview('Add');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('adminProjectEditProjectForm').reset();
        resetFeaturedImagePreview('Edit');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Featured Image Preview
    function previewFeaturedImage(modalType) {
        const fileInput = document.getElementById('featuredImage' + modalType);
        const preview = document.getElementById('featuredImagePreview' + modalType);
        const placeholder = document.getElementById('featuredImagePlaceholder' + modalType);
        
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }

    function resetFeaturedImagePreview(modalType) {
        const fileInput = document.getElementById('featuredImage' + modalType);
        const preview = document.getElementById('featuredImagePreview' + modalType);
        const placeholder = document.getElementById('featuredImagePlaceholder' + modalType);
        
        if (fileInput) fileInput.value = '';
        if (preview) {
            preview.classList.add('hidden');
            preview.src = '';
        }
        if (placeholder) placeholder.classList.remove('hidden');
    }

    // Add Project
    document.getElementById('addProjectForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        
        try {
            const response = await fetch('{{ route("admin.projects.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });
            const data = await response.json();
            if (response.ok) {
                showNotification('success', data.message || 'Project berhasil ditambahkan');
                adminProjectCloseAddModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            showNotification('error', error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    // Edit Project
    async function adminProjectEditProject(id) {
        try {
            const response = await fetch(`/admin/projects/${id}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const result = await response.json();
            if (response.ok) {
                const project = result.data;
                document.getElementById('adminProjectEditProjectId').value = project.id;
                document.getElementById('editTitle').value = project.title;
                document.getElementById('editClient').value = project.client || '';
                document.getElementById('editLocation').value = project.location || '';
                document.getElementById('editStartDate').value = project.start_date || '';
                document.getElementById('editEndDate').value = project.end_date || '';
                document.getElementById('editCategory').value = project.category || '';
                document.getElementById('editStatus').value = project.status;
                document.getElementById('editOrder').value = project.order;
                document.getElementById('editDescription').value = project.description;
                document.getElementById('editChallenges').value = project.challenges || '';
                document.getElementById('editSolutions').value = project.solutions || '';
                document.getElementById('editResults').value = project.results || '';
                document.getElementById('editIsFeatured').checked = project.is_featured;
                document.getElementById('editIsPublished').checked = project.is_published;

                            const galleryPreview = document.getElementById('galleryPreviewEdit');
            galleryPreview.innerHTML = '';
            if (project.gallery_images && project.gallery_images.length > 0) {
                project.gallery_images.forEach(image => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative group';
                    wrapper.innerHTML = `
                        <img src="/storage/${image}" class="w-full h-20 object-cover rounded-lg border border-slate-200">
                        <button type="button" 
                                onclick="removeExistingGalleryImage(this, '${image}', ${project.id})" 
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-xs shadow-md hover:bg-red-600">
                            ×
                        </button>
                    `;
                    galleryPreview.appendChild(wrapper);
                });
            }

                if (project.featured_image) {
                    const preview = document.getElementById('featuredImagePreviewEdit');
                    const placeholder = document.getElementById('featuredImagePlaceholderEdit');
                    preview.src = `/storage/${project.featured_image}`;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                document.getElementById('editModal').classList.remove('hidden');
            } else {
                throw new Error(result.message || 'Gagal memuat data project');
            }
        } catch (error) {
            showNotification('error', error.message);
        }
    }

    // Update Project
    document.getElementById('adminProjectEditProjectForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const projectId = document.getElementById('adminProjectEditProjectId').value;
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        
        try {
            const response = await fetch(`/admin/projects/${projectId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });
            const data = await response.json();
            if (response.ok) {
                showNotification('success', data.message || 'Project berhasil diupdate');
                closeEditModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            showNotification('error', error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    // Delete Project
    let projectToDelete = null;

    function adminProjectDeleteProject(id) {
        projectToDelete = id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
        if (!projectToDelete) return;
        const btn = this;
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        
        try {
            const response = await fetch(`/admin/projects/${projectToDelete}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                }
            });
            const data = await response.json();
            if (response.ok) {
                showNotification('success', data.message || 'Project berhasil dihapus');
                closeDeleteModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            showNotification('error', error.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
            projectToDelete = null;
        }
    });

    // Notification Function
    function showNotification(type, message) {
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
        const icon = type === 'success' ?
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' :
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 z-[9999] animate-slide-in`;
        notification.innerHTML = `${icon}<span class="font-medium">${message}</span>`;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.style.animation = 'slide-out 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slide-in {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-out {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }
    `;
    document.head.appendChild(style);

    // Gallery Preview Handler
function previewGallery(modalType) {
    const input = document.getElementById('galleryInput' + modalType);
    const previewContainer = document.getElementById('galleryPreview' + modalType);
    const files = Array.from(input.files);

    // Clear current preview
    previewContainer.innerHTML = '';

    // Create preview for each file
    files.forEach((file, index) => {
        if (!file.type.match('image.*')) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative group';
            wrapper.innerHTML = `
                <img src="${e.target.result}" class="w-full h-20 object-cover rounded-lg border border-slate-200">
                <button type="button" onclick="removeGalleryImage(this, '${modalType}', ${index})" 
                        class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-xs shadow-md hover:bg-red-600">
                    ×
                </button>
            `;
            previewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });
}

function removeGalleryImage(button, modalType, fileIndex) {
    const input = document.getElementById('galleryInput' + modalType);
    const dt = new DataTransfer();
    const files = Array.from(input.files);

    // Add all files except the one to remove
    files.forEach((file, i) => {
        if (i !== fileIndex) dt.items.add(file);
    });

    // Replace files
    input.files = dt.files;

    // Rebuild preview
    previewGallery(modalType);
}

// Preview new gallery images (for add/edit)
function previewNewGallery(modalType) {
    const input = document.getElementById('galleryInput' + modalType);
    const previewContainer = document.getElementById('galleryPreview' + modalType);
    const files = Array.from(input.files);

    // Create preview for each file
    files.forEach((file, index) => {
        if (!file.type.match('image.*')) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative group';
            wrapper.innerHTML = `
                <img src="${e.target.result}" class="w-full h-20 object-cover rounded-lg border border-slate-200">
                <button type="button" onclick="removeGalleryImage(this, '${modalType}', ${index})" 
                        class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-xs shadow-md hover:bg-red-600">
                    ×
                </button>
            `;
            previewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });
}

// Remove image from preview (before submit)
function removeGalleryImage(button, modalType, fileIndex) {
    const input = document.getElementById('galleryInput' + modalType);
    const dt = new DataTransfer();
    const files = Array.from(input.files);

    // Add all files except the one to remove
    files.forEach((file, i) => {
        if (i !== fileIndex) dt.items.add(file);
    });

    // Replace files
    input.files = dt.files;

    // Rebuild preview
    const previewContainer = document.getElementById('galleryPreview' + modalType);
    previewContainer.innerHTML = '';
    previewNewGallery(modalType);
}

// For editing: remove existing image (server-side)
function removeExistingGalleryImage(button, imagePath) {
    if (!confirm('Yakin ingin menghapus gambar ini?')) return;

    fetch(`/admin/projects/delete-gallery-image`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ 
            path: imagePath,
            project_id: projectId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('success', 'Gambar berhasil dihapus');
            // Hapus dari DOM
            const wrapper = button.closest('.relative.group');
            if (wrapper) wrapper.remove();
        } else {
            showNotification('error', data.message || 'Gagal menghapus gambar');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('error', 'Terjadi kesalahan saat menghapus gambar');
    });
}

</script>

@endsection 