<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('book_tours', function (Blueprint $table) {
            // New fields for full booking/inquiry system
            $table->string('country')->nullable()->after('phone');
            $table->text('special_requirements')->nullable()->after('comment');
            $table->text('notes')->nullable()->after('special_requirements');
            $table->string('type')->default('booking')->after('status'); // 'booking' or 'inquiry'

            // Expand status enum to include new workflow statuses
            $table->dropColumn('status');
        });

        Schema::table('book_tours', function (Blueprint $table) {
            $table->string('status')->default('New')->after('guests');
        });
    }

    public function down(): void
    {
        Schema::table('book_tours', function (Blueprint $table) {
            $table->dropColumn(['country', 'special_requirements', 'notes', 'type']);
            $table->dropColumn('status');
        });

        Schema::table('book_tours', function (Blueprint $table) {
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled', 'Completed'])->default('Pending')->after('guests');
        });
    }
};
