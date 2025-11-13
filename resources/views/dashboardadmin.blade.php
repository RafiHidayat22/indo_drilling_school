@extends('layouts.adminmain')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">{{ $pageTitle }}</h1>
                    <p class="mt-2 text-sm text-slate-600">Selamat datang kembali, {{ Auth::user()->name ?? 'Admin' }}!</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-600">{{ now()->isoFormat('dddd, D MMMM YYYY') }}</p>
                    <p class="text-xs text-slate-500 mt-1">{{ now()->format('H:i') }} WIB</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid - Row 1 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total Articles -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Artikel</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['totalArticles'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-green-600 font-semibold">+{{ $stats['newArticlesThisMonth'] }}</span> bulan ini
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Programs -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Program</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['totalPrograms'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-blue-600 font-semibold">{{ $stats['activePrograms'] }}</span> aktif
                        </p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total User</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['totalUsers'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-green-600 font-semibold">+{{ $stats['newUsersThisWeek'] }}</span> minggu ini
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Inquiries -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Inquiry Pending</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['pendingInquiries'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-amber-600 font-semibold">{{ $stats['unreadInquiries'] }}</span> belum dibaca
                        </p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-lg">
                        <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid - Row 2 (Projects & Gallery) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Projects -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Project</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['totalProjects'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-cyan-600 font-semibold">{{ $stats['activeProjects'] }}</span> sedang berjalan
                        </p>
                    </div>
                    <div class="p-3 bg-cyan-100 rounded-lg">
                        <svg class="w-6 h-6 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Completed Projects -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Project Selesai</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['completedProjects'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-green-600 font-semibold">{{ $stats['featuredProjects'] }}</span> ditampilkan
                        </p>
                    </div>
                    <div class="p-3 bg-emerald-100 rounded-lg">
                        <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Gallery Images -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Galeri</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['totalGalleryImages'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-pink-600 font-semibold">{{ $stats['activeGalleryImages'] }}</span> aktif
                        </p>
                    </div>
                    <div class="p-3 bg-pink-100 rounded-lg">
                        <svg class="w-6 h-6 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Featured Gallery Images -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Galeri Featured</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['featuredGalleryImages'] }}</p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-rose-600 font-semibold">Ditampilkan Unggulan</span>
                        </p>
                    </div>
                    <div class="p-3 bg-rose-100 rounded-lg">
                        <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Recent Articles -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Artikel Terbaru</h2>
                    <a href="{{ route('articleadmin.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                        Lihat Semua →
                    </a>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($recentArticles as $article)
                        <div class="flex items-start space-x-4 p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br {{ $article['colorClass'] }} rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">{{ substr($article['title'], 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="text-sm font-semibold text-slate-900 truncate">{{ $article['title'] }}</h3>
                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $article['statusClass'] }}">
                                        {{ $article['status'] }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-600 mb-2">{{ $article['category'] }}</p>
                                <div class="flex items-center text-xs text-slate-500">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $article['author'] }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $article['date'] }}</span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <p class="text-slate-500 text-sm">Belum ada artikel terbaru</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Inquiries -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                        <h2 class="text-lg font-semibold text-slate-800">Quick Actions</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('articleadmin.index') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                                <div class="p-2 bg-purple-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Tambah Artikel</span>
                            </a>
                            <a href="{{ route('categories.index') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                                <div class="p-2 bg-blue-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Tambah Program</span>
                            </a>
                            <a href="{{ route('users.index') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                                <div class="p-2 bg-green-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Tambah User</span>
                            </a>
                            <a href="{{ route('contactadmin') }}" class="flex items-center p-3 bg-amber-50 hover:bg-amber-100 rounded-lg transition group">
                                <div class="p-2 bg-amber-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Lihat Inquiry</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Inquiries -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-slate-800">Inquiry Terbaru</h2>
                        <a href="{{ route('contactadmin') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            @forelse($recentInquiries as $inquiry)
                            <div class="flex items-start space-x-3 p-3 bg-slate-50 rounded-lg hover:bg-slate-100 transition">
                                @if(!$inquiry['is_read'])
                                <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 flex-shrink-0 animate-pulse"></span>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-slate-900 truncate">{{ $inquiry['name'] }}</h4>
                                    <p class="text-xs text-slate-600 truncate">{{ $inquiry['subject'] }}</p>
                                    <p class="text-xs text-slate-500 mt-1">{{ $inquiry['time'] }}</p>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-4">
                                <p class="text-slate-500 text-sm">Belum ada inquiry</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects & Gallery Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Recent Projects -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Project Terbaru</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($recentProjects as $project)
                        <div class="p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition">
                            <div class="flex items-start justify-between mb-2">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h3 class="text-sm font-semibold text-slate-900 truncate">{{ $project['title'] }}</h3>
                                        @if($project['is_featured'])
                                        <svg class="w-4 h-4 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        @endif
                                    </div>
                                    <p class="text-xs text-slate-600 mb-2">
                                        <span class="font-medium">Client:</span> {{ $project['client'] }}
                                    </p>
                                </div>
                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $project['statusClass'] }} flex-shrink-0">
                                    {{ $project['status'] }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium {{ $project['categoryClass'] }}">
                                    {{ $project['category'] }}
                                </span>
                                <span class="text-xs text-slate-500">{{ $project['date'] }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <p class="text-slate-500 text-sm">Belum ada project</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Project Status Distribution -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                    <h2 class="text-lg font-semibold text-slate-800">Status Project</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        @forelse($projectsByStatus as $status)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-slate-700">{{ $status['status'] }}</span>
                                <span class="text-sm font-semibold text-slate-900">{{ $status['count'] }} Project</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex-1 bg-slate-200 rounded-full h-3">
                                    <div class="h-3 rounded-full {{ str_replace('text-', 'bg-', explode(' ', $status['colorClass'])[0]) }}" style="width: {{ ($status['count'] / $stats['totalProjects']) * 100 }}%"></div>
                                </div>
                                <span class="text-xs text-slate-500 w-12 text-right">{{ round(($status['count'] / $stats['totalProjects']) * 100, 1) }}%</span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <p class="text-slate-500 text-sm">Belum ada data status project</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Images Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center justify-between">
                <h2 class="text-lg font-semibold text-slate-800">Galeri Terbaru</h2>
            </div>
            <div class="p-6">
                @if(count($recentGalleryImages) > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    @foreach($recentGalleryImages as $image)
                    <div class="group relative">
                        <div class="aspect-square rounded-lg overflow-hidden bg-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
                            <img src="{{ $image['image_url'] }}" alt="{{ $image['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3">
                                    <h3 class="text-xs font-semibold text-white truncate">{{ $image['title'] }}</h3>
                                    <p class="text-xs text-slate-200">{{ $image['year'] }}</p>
                                </div>
                            </div>
                            @if($image['is_featured'])
                            <div class="absolute top-2 right-2">
                                <span class="inline-flex items-center justify-center w-6 h-6 bg-yellow-500 rounded-full shadow-lg">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-slate-500 text-sm">Belum ada gambar di galeri</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Articles by Category -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                    <h2 class="text-lg font-semibold text-slate-800">Artikel per Kategori</h2>
                </div>
                <div class="p-6">
                    @if(count($articlesByCategory) > 0)
                    <div class="space-y-4">
                        @foreach($articlesByCategory as $category)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-slate-700">{{ $category['name'] }}</span>
                                <span class="text-sm font-semibold text-slate-900">{{ $category['count'] }}</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="h-2 rounded-full {{ $category['colorClass'] }}" style="width: {{ $category['percentage'] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-8">
                        <p class="text-slate-500 text-sm">Belum ada artikel dalam kategori</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- System Activity -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                    <h2 class="text-lg font-semibold text-slate-800">Aktivitas Sistem</h2>
                </div>
                <div class="p-6">
                    @if(count($systemActivity) > 0)
                    <div class="space-y-4">
                        @foreach($systemActivity as $activity)
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full {{ $activity['iconBg'] }} flex items-center justify-center">
                                    {!! $activity['icon'] !!}
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-slate-800">{!! $activity['description'] !!}</p>
                                <p class="text-xs text-slate-500 mt-1">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-8">
                        <p class="text-slate-500 text-sm">Belum ada aktivitas sistem</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection