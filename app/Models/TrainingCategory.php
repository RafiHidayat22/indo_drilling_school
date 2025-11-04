<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image',
        'order',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function subcategories()
    {
        return $this->hasMany(TrainingSubcategory::class, 'category_id');
    }

    // Fix: hasManyThrough relationship
    public function trainings()
    {
        return $this->hasManyThrough(
            Training::class,
            TrainingSubcategory::class,
            'category_id',    // Foreign key on training_subcategories table
            'subcategory_id', // Foreign key on trainings table
            'id',             // Local key on training_categories table
            'id'              // Local key on training_subcategories table
        );
    }

    // Helper method untuk menghitung jumlah training
    public function getTrainingsCountAttribute()
    {
        return $this->trainings()->count();
    }
}
