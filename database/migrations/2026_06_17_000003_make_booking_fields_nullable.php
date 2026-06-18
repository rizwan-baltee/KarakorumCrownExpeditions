<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('book_tours', function (Blueprint $table) {
            // Make dates nullable for inquiries (inquiries may not have specific dates)
            $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();
            // Make trek optional for general inquiries / custom tour requests
            $table->foreignId('trending_trek_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('book_tours', function (Blueprint $table) {
            $table->date('start_date')->nullable(false)->change();
            $table->date('end_date')->nullable(false)->change();
            $table->foreignId('trending_trek_id')->nullable(false)->change();
        });
    }
};
