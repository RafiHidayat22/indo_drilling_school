<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactInquiry;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share $unreadInquiries ke semua view yang menggunakan topbar
        View::composer('admin.topbar', function ($view) {
            $unreadInquiries = ContactInquiry::unread()->latest()->take(5)->get();
            $view->with('unreadInquiries', $unreadInquiries);
        });
    }
}
