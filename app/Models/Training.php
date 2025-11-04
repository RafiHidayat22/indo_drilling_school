<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'title',
        'slug',
        'description',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function subcategory()
    {
        return $this->belongsTo(TrainingSubcategory::class, 'subcategory_id');
    }

    // Accessor untuk mendapatkan category melalui subcategory
    public function category()
    {
        return $this->subcategory()->category();
    }
}