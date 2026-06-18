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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trending_trek_id')->constrained()->onDelete('cascade');
            $table->string('group_type'); // Solo, 2 to 6 Person, 7 to 12 Person, 9 to 20 Person
            $table->integer('min_persons')->default(1);
            $table->integer('max_persons')->default(1);
            $table->decimal('price_usd', 10, 2); // 2300, 2200, 1900
            $table->string('currency', 3)->default('USD');
            $table->date('start_date')->nullable(); // 10 June 2026
            $table->date('end_date')->nullable(); // 30 June 2026
            $table->enum('availability', ['Available', 'Not Available', 'Limited'])->default('Available');
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
