<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ContactInquiry extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'contact_inquiries';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'full_name',
        'company_name',
        'email',
        'phone_number',
        'subject',
        'message',
        'admin_notes',
        'read_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'read_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Check if inquiry has been read by admin
     */
    public function isRead(): bool
    {
        return $this->read_at !== null;
    }

    /**
     * Check if inquiry was created today
     */
    public function isToday(): bool
    {
        return $this->created_at->isToday();
    }

    /**
     * Get automatic status based on created_at and read_at
     * Returns: 'new' (today), 'unread' (old but not read), 'read' (already read)
     */
    public function getAutoStatus(): string
    {
        if ($this->isToday()) {
            return 'new';
        }
        if (!$this->isRead()) {
            return 'unread';
        }
        return 'read';
    }

    /**
     * Get status label in Indonesian
     */
    public function getStatusLabel(): string
    {
        return match ($this->getAutoStatus()) {
            'new' => 'Hari Ini',
            'unread' => 'Belum Dibaca',
            'read' => 'Sudah Dibaca',
            default => 'Unknown',
        };
    }

    /**
     * Get status badge class for Tailwind CSS
     */
    public function getStatusBadgeClass(): string
    {
        return match ($this->getAutoStatus()) {
            'new' => 'bg-blue-100 text-blue-800',
            'unread' => 'bg-amber-100 text-amber-800',
            'read' => 'bg-green-100 text-green-800',
            default => 'bg-slate-100 text-slate-800',
        };
    }

    /**
     * Get status icon emoji
     */
    public function getStatusIcon(): string
    {
        return match ($this->getAutoStatus()) {
            'new' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="#2563eb"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>',
            'unread' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="#d97706"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>',
            'read' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="#059669"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>',
            default => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="#64748b"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-8 2l-6 3v2l6 3 6-3V8l-6 3z"/></svg>',
        };
    }

    /**
     * Mark inquiry as read
     */
    public function markAsRead(): bool
    {
        if (!$this->isRead()) {
            return $this->update(['read_at' => now()]);
        }

        return false;
    }

    /**
     * Mark inquiry as unread
     */
    public function markAsUnread(): bool
    {
        if ($this->isRead()) {
            return $this->update(['read_at' => null]);
        }

        return false;
    }

    /**
     * Scope: Get inquiries created today
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope: Get unread inquiries
     */
    // Hapus scope unreadStatus lama, ganti dengan:
    // Scope: Semua yang BELUM DIBACA (tanpa peduli tanggal)
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Scope: Get read inquiries
     */
    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Scope: Get inquiries with 'new' status (today)
     */
    public function scopeNewStatus($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope: Get inquiries with 'read' status
     */
    public function scopeReadStatus($query)
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Scope: Filter by status (new/unread/read)
     */
    public function scopeByStatus($query, string $status)
    {
        return match ($status) {
            'new' => $query->newStatus(),     // created_at = today()
            'unread' => $query->unread(),     // read_at IS NULL (SEMUA, termasuk hari ini)
            'read' => $query->readStatus(),   // read_at IS NOT NULL
            default => $query,
        };
    }

    /**
     * Scope: Search by name, email, company, or subject
     */
    public function scopeSearch($query, ?string $search)
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('full_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('company_name', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%");
        });
    }

    /**
     * Scope: Order by latest first
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Get formatted created date
     */
    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('d M Y, H:i');
    }

    /**
     * Get human readable time difference
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }
}
