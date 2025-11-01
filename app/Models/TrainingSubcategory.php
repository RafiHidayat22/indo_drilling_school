<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Model TrainingSubcategory
class TrainingSubcategory extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'order',
        'status'
    ];

    protected $casts = [
        'category_id' => 'integer',
        'order' => 'integer'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(TrainingCategory::class, 'category_id');
    }

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class, 'subcategory_id');
    }

    public function activeTrainings(): HasMany
    {
        return $this->trainings()->where('status', 'Active');
    }
}