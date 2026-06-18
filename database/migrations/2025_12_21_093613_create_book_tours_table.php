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
        Schema::create('book_tours', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('trending_trek_id')->constrained()->onDelete('cascade');
            $table->foreignId('price_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('guests')->default(1);
            $table->text('comment')->nullable();
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled', 'Completed'])->default('Pending');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tours');
    }
};
