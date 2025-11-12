<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'client',
        'location',
        'start_date',
        'end_date',
        'status',
        'category',
        'featured_image',
        'gallery_images',
        'challenges',
        'solutions',
        'results',
        'order',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getStatusBadgeColorAttribute()
    {
        return match($this->status) {
            'ongoing' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getCategoryBadgeColorAttribute()
    {
        return match($this->category) {
            'drilling' => 'bg-red-100 text-red-800',
            'safety' => 'bg-yellow-100 text-yellow-800',
            'certification' => 'bg-blue-100 text-blue-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}