<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman contact.
     */
    public function index(): View
    {
        // Hanya menampilkan view contact.blade.php
        return view('contact');
    }

    /**
     * Menyimpan inquiry dari form contact ke database.
     */
    public function store(Request $request): JsonResponse // Ubah return type
    {
        // 1. Validasi input dari form
        $validator = Validator::make($request->all(), [
            'fullName'    => 'required|string|max:255',
            'companyName' => 'nullable|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'subject'     => 'required|string|in:training,partnership,certification,consultation,other',
            'message'     => 'required|string',
        ], [
            'fullName.required' => 'Nama lengkap wajib diisi.',
            'email.required'    => 'Alamat email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'phone.required'    => 'Nomor telepon wajib diisi.',
            'subject.required'  => 'Subjek pesan wajib dipilih.',
            'message.required'  => 'Isi pesan wajib diisi.',
        ]);

        // 2. Jika validasi gagal, kembalikan error dalam format JSON
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        // 3. Jika validasi sukses, buat dan simpan inquiry
        $inquiry = new ContactInquiry();
        $inquiry->full_name    = $request->input('fullName');
        $inquiry->company_name = $request->input('companyName');
        $inquiry->email        = $request->input('email');
        $inquiry->phone_number = $request->input('phone');
        $inquiry->subject      = $request->input('subject');
        $inquiry->message      = $request->input('message');
        $inquiry->save();

        // 4. Kembalikan respons JSON sukses
        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda telah berhasil dikirim. Terima kasih!' // Pesan opsional
        ], 200);
    }
}
