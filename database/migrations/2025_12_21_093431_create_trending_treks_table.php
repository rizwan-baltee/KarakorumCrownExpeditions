<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trending_treks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained()->onDelete('cascade');
            $table->string('title'); // K2 Base camp trek
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('overview')->nullable(); // Detailed overview text
            $table->string('location'); // K2 Base camp trek
            $table->integer('duration_days'); // 21 days
            $table->integer('difficulty_level')->default(1); // 1-5 scale
            $table->decimal('height_meters', 8, 2)->nullable(); // 5100m, 8611m
            $table->integer('min_age')->default(18);
            $table->integer('max_guests')->default(7);
            $table->string('languages_support')->default('All'); // All, English, Urdu
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('priority')->default(0); // For sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trending_treks');
    }
};
