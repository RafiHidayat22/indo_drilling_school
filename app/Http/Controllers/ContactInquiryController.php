<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class ContactInquiryController extends Controller
{
    /**
     * Display contact inquiry management page
     */
    public function index(Request $request): View
    {
        $user = current_user();
        $isSuperAdmin = is_super_admin();
        $pageTitle = 'Contact Admin';

        // --- Ambil Parameter Query ---
        $search = $request->input('search');
        $status = $request->input('status'); // new, unread, read

        // --- Bangun Query dengan Scope ---
        $query = ContactInquiry::query();

        // --- Terapkan Filter Pencarian menggunakan Scope ---
        if ($search) {
            $query->search($search);
        }

        // --- Terapkan Filter Status Otomatis ---
        if ($status) {
            $query->byStatus($status);
        }

        // --- Ambil Data dengan Pagination (Latest First) ---
        $inquiries = $query->latest()->paginate(15)->withQueryString();

        // --- Hitung Statistik dengan Status Otomatis ---
        $stats = [
            'total' => ContactInquiry::count(),
            'new' => ContactInquiry::newStatus()->count(),   // hanya hari ini
            'unread' => ContactInquiry::unread()->count(),   // semua belum dibaca
            'read' => ContactInquiry::readStatus()->count(),
        ];

        // --- Kirim Data ke View ---
        return view('contactadmin', compact(
            'user',
            'isSuperAdmin',
            'pageTitle',
            'inquiries',
            'stats'
        ));
    }

    /**
     * Display the specified inquiry
     */
    public function show(ContactInquiry $contact): RedirectResponse
    {
        $contact->markAsRead();
        return redirect()->route('contactadmin')->with('success', 'Inquiry telah dibaca.');
    }

    /**
     * Mark inquiry as read (AJAX)
     */
    public function markAsRead(ContactInquiry $contact): JsonResponse
    {
        $contact->markAsRead();

        return response()->json([
            'success' => true,
            'message' => 'Inquiry telah ditandai sebagai sudah dibaca',
            'status' => $contact->getAutoStatus(),
            'status_label' => $contact->getStatusLabel(),
        ]);
    }

    /**
     * Mark inquiry as unread (AJAX) - Optional
     */
    public function markAsUnread(ContactInquiry $contact): JsonResponse
    {
        $contact->markAsUnread();

        return response()->json([
            'success' => true,
            'message' => 'Inquiry telah ditandai sebagai belum dibaca',
            'status' => $contact->getAutoStatus(),
            'status_label' => $contact->getStatusLabel(),
        ]);
    }

    /**
     * Remove the specified inquiry from storage.
     */
    public function destroy(ContactInquiry $contact): RedirectResponse
    {
        $name = $contact->full_name;

        $contact->forceDelete(); // Hard delete

        return redirect()
            ->route('contactadmin')
            ->with('success', "Inquiry dari {$name} berhasil dihapus.");
    }

    /**
     * Get inquiry statistics (AJAX) - Optional untuk refresh stats tanpa reload
     */
    public function getStats(): JsonResponse
    {
        $stats = [
            'total' => ContactInquiry::count(),
            'new' => ContactInquiry::newStatus()->count(),
            'unread' => ContactInquiry::unreadStatus()->count(),
            'read' => ContactInquiry::readStatus()->count(),
        ];

        return response()->json($stats);
    }
    // Di ContactInquiryController.php
    public function unreadCount(): JsonResponse
    {
        return response()->json([
            'count' => ContactInquiry::unread()->count()
        ]);
    }
}
