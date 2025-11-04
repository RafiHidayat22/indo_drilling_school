@extends('layouts.adminmain')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">{{ $pageTitle }}</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola pertanyaan & permintaan dari client</p>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center justify-between">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Inquiries -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Inquiries</p>
                        <p class="text-3xl font-bold text-slate-800">{{ $stats['total'] }}</p>
                    </div>
                    <div class="p-3 bg-slate-100 rounded-lg">
                        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- New Today -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Hari Ini</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['new'] }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Unread -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Belum Dibaca</p>
                        <p class="text-3xl font-bold text-amber-600">{{ $stats['unread'] }}</p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-lg">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Read -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Sudah Dibaca</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['read'] }}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <form method="GET" action="{{ route('contactadmin') }}">
                <div class="flex flex-wrap items-center gap-4">
                    <!-- Search -->
                    <div class="flex-1 min-w-[250px]">
                        <div class="relative">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari nama, email, perusahaan..."
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                            <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Custom Status Filter with SVG (Alpine.js) -->
                    <div x-data="{ open: false, selected: '{{ request('status') ?: 'all' }}' }" class="min-w-[180px] relative">
                        <button type="button" @click="open = !open" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg flex items-center justify-between focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
                            <span x-text="{
            'new': 'Hari Ini',
            'unread': 'Belum Dibaca',
            'read': 'Sudah Dibaca',
            'all': 'Semua Status'
        }[selected]"></span>
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute z-10 mt-1 w-full bg-white border border-slate-300 rounded-lg shadow-lg">
                            <a href="?status=" @click="selected = 'all'; open = false" class="flex items-center px-4 py-2.5 hover:bg-slate-50 text-sm">
                                Semua Status
                            </a>
                            <a href="?status=new" @click="selected = 'new'; open = false" class="flex items-center px-4 py-2.5 hover:bg-blue-50 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                </svg>
                                Hari Ini
                            </a>
                            <a href="?status=unread" @click="selected = 'unread'; open = false" class="flex items-center px-4 py-2.5 hover:bg-amber-50 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-amber-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                </svg>
                                Belum Dibaca
                            </a>
                            <a href="?status=read" @click="selected = 'read'; open = false" class="flex items-center px-4 py-2.5 hover:bg-green-50 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                                Sudah Dibaca
                            </a>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold text-sm">
                        Filter
                    </button>

                    <!-- Reset Button -->
                    <a href="{{ route('contactadmin') }}" class="px-6 py-2.5 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition font-semibold text-sm">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Inquiries</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-12">No</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Contact Info</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Subject & Message</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-24">Status</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-32">Tanggal</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-20">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($inquiries as $index => $inquiry)
                        <tr class="hover:bg-slate-50 transition {{ !$inquiry->isRead() ? 'bg-blue-50/30' : '' }}">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-700 font-medium">
                                {{ ($inquiries->currentPage() - 1) * $inquiries->perPage() + $index + 1 }}
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-start">
                                    @if(!$inquiry->isRead())
                                    <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mr-2 mt-2 animate-pulse"></span>
                                    @endif
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900">{{ $inquiry->full_name }}</div>
                                        @if($inquiry->company_name)
                                        <div class="text-xs text-slate-600">{{ $inquiry->company_name }}</div>
                                        @endif
                                        <div class="text-xs text-slate-500">{{ $inquiry->email }}</div>
                                        <div class="text-xs text-slate-500">{{ $inquiry->phone_number }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm font-semibold text-slate-900 mb-1">{{ $inquiry->subject }}</div>
                                <p class="text-sm text-slate-700 line-clamp-2">{{ $inquiry->message }}</p>
                                @if($inquiry->admin_notes)
                                <div class="mt-2 p-2 bg-amber-50 rounded border border-amber-200">
                                    <p class="text-xs text-amber-800"><strong>Admin Notes:</strong> {{ $inquiry->admin_notes }}</p>
                                </div>
                                @endif
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $inquiry->getStatusBadgeClass() }}">
                                    <span class="mr-1">{!! $inquiry->getStatusIcon() !!}</span>
                                    {{ $inquiry->getStatusLabel() }}
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900">{{ $inquiry->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-slate-500">{{ $inquiry->created_at->format('H:i') }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">{{ $inquiry->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-1">
                                    <!-- Detail Button -->
                                    <button onclick="openDetailModal({{ Js::from($inquiry) }})"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="View Details">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <!-- Delete Button -->
                                    <button onclick="openDeleteModal({{ Js::from($inquiry) }})"
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-slate-500">Tidak ada data inquiry.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                @if($inquiries->isNotEmpty())
                {{ $inquiries->withQueryString()->links('pagination.custom') }}
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full my-8">
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Detail Inquiry</h3>
                    <button onclick="closeDetailModal()" class="text-white hover:text-slate-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="detailContent" class="p-6 space-y-4">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
                <p class="text-slate-600 text-center mb-6">
                    Apakah Anda yakin ingin menghapus inquiry dari <span id="deleteName" class="font-semibold text-slate-900"></span>? Tindakan ini tidak dapat dibatalkan.
                </p>
                <div class="flex space-x-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" style="flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition shadow-lg">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getStatusDisplay(inquiry) {
        const createdDate = new Date(inquiry.created_at);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        createdDate.setHours(0, 0, 0, 0);

        const isToday = createdDate.getTime() === today.getTime();
        const isRead = inquiry.read_at !== null;

        // Fungsi helper untuk membuat SVG sebagai string
        const svgNew = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>`;
        const svgUnread = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>`;
        const svgRead = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>`;

        if (isToday) {
            return {
                label: `${svgNew} Hari Ini`,
                class: 'bg-blue-100 text-blue-800'
            };
        } else if (!isRead) {
            return {
                label: `${svgUnread} Belum Dibaca`,
                class: 'bg-amber-100 text-amber-800'
            };
        } else {
            return {
                label: `${svgRead} Sudah Dibaca`,
                class: 'bg-green-100 text-green-800'
            };
        }
    }

    window.openDetailModal = function(data) {
        const content = document.getElementById('detailContent');
        const status = getStatusDisplay(data);

        content.innerHTML = `
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Full Name</p>
                    <p class="text-sm text-slate-900 font-medium">${data.full_name}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Company Name</p>
                    <p class="text-sm text-slate-900">${data.company_name || '-'}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Email Address</p>
                    <p class="text-sm text-slate-900">${data.email}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Phone Number</p>
                    <p class="text-sm text-slate-900">${data.phone_number || '-'}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Subject</p>
                    <p class="text-sm text-slate-900 font-semibold">${data.subject}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Message</p>
                    <div class="bg-slate-50 p-4 rounded-lg">
                        <p class="text-sm text-slate-700 whitespace-pre-wrap">${data.message}</p>
                    </div>
                </div>
                ${data.admin_notes ? `
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Admin Notes</p>
                    <div class="bg-amber-50 border border-amber-200 p-4 rounded-lg">
                        <p class="text-sm text-amber-900 whitespace-pre-wrap">${data.admin_notes}</p>
                    </div>
                </div>
                ` : ''}
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Status</p>
                    <div class="mt-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ${status.class}">
                            ${status.label}
                        </span>
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Submitted Date</p>
                    <p class="text-sm text-slate-900">${new Date(data.created_at).toLocaleString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    })}</p>
                </div>
            </div>
        `;
        document.getElementById('detailModal').classList.remove('hidden');

        // Mark as read when opening detail
        if (!data.read_at) {
            fetch(`/contacts/${data.id}/mark-read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(() => {
                // Refresh page to update status
                setTimeout(() => location.reload(), 500);
            });
        }
    };

    window.closeDetailModal = function() {
        document.getElementById('detailModal').classList.add('hidden');
    };

    window.openDeleteModal = function(data) {
        document.getElementById('deleteName').textContent = data.full_name;
        document.getElementById('deleteForm').action = '/contacts/' + data.id;
        document.getElementById('deleteModal').classList.remove('hidden');
    };

    window.closeDeleteModal = function() {
        document.getElementById('deleteModal').classList.add('hidden');
    };

    // Close modal on outside click
    document.addEventListener('click', function(e) {
        const modals = ['detailModal', 'deleteModal'];
        modals.forEach(id => {
            const modal = document.getElementById(id);
            if (modal && !modal.classList.contains('hidden') && e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });

    // Auto-hide success alert
    setTimeout(() => {
        const alert = document.querySelector('.bg-green-50');
        if (alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);
</script>
@endsection