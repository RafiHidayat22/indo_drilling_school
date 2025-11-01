<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Model Training (Simplified)
class Training extends Model
{
    protected $fillable = [
        'subcategory_id',
        'title',
        'slug',
        'description',
        'status'
    ];

    protected $casts = [
        'subcategory_id' => 'integer'
    ];

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(TrainingSubcategory::class, 'subcategory_id');
    }
}