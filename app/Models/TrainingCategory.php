<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Model TrainingCategory
class TrainingCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'order',
        'status'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function subcategories(): HasMany
    {
        return $this->hasMany(TrainingSubcategory::class, 'category_id');
    }

    public function activeSubcategories(): HasMany
    {
        return $this->subcategories()->where('status', 'Active')->orderBy('order');
    }
}