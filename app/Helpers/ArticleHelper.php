<?php

namespace App\Helpers;

class ArticleHelper
{
    /**
     * Get category badge color class
     */
    public static function getCategoryBadgeColor($categorySlug)
    {
        $colors = [
            'training' => 'bg-purple-100 text-purple-800',
            'hse' => 'bg-red-100 text-red-800',
            'certification' => 'bg-blue-100 text-blue-800',
            'career' => 'bg-green-100 text-green-800',
            'news' => 'bg-amber-100 text-amber-800',
            'other' => 'bg-slate-100 text-slate-800',
            'lainnya' => 'bg-slate-100 text-slate-800',
        ];

        return $colors[strtolower($categorySlug)] ?? 'bg-slate-100 text-slate-800';
    }

    /**
     * Get status badge color class
     */
    public static function getStatusBadgeColor($status)
    {
        $colors = [
            'published' => 'bg-green-100 text-green-800',
            'draft' => 'bg-amber-100 text-amber-800',
            'archived' => 'bg-slate-100 text-slate-800',
        ];

        return $colors[strtolower($status)] ?? 'bg-slate-100 text-slate-800';
    }

    /**
     * Format file size
     */
    public static function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    /**
     * Truncate text
     */
    public static function truncate($text, $length = 100, $ending = '...')
    {
        if (strlen($text) > $length) {
            return substr($text, 0, $length - strlen($ending)) . $ending;
        }
        return $text;
    }

    /**
     * Generate excerpt from content
     */
    public static function generateExcerpt($content, $length = 200)
    {
        $stripped = strip_tags($content);
        return self::truncate($stripped, $length);
    }
}