<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Kategori Pelatihan
        Schema::create('training_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('icon')->nullable(); // SVG icon
            $table->integer('order')->default(0);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });

        // Tabel Sub Kategori Pelatihan
        Schema::create('training_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('training_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
            
            $table->unique(['category_id', 'slug']);
        });

        // Tabel Pelatihan (Simplified)
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategory_id')->constrained('training_subcategories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
            
            $table->unique(['subcategory_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('training_subcategories');
        Schema::dropIfExists('training_categories');
    }
};