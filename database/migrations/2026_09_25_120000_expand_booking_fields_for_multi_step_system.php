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
        Schema::table('book_tours', function (Blueprint $table) {
            $table->integer('adults')->default(1)->after('guests');
            $table->integer('children')->default(0)->after('adults');
            $table->string('package_tier')->nullable()->after('children'); // Standard, Premium, Private, Group
            $table->string('trip_type')->nullable()->after('package_tier'); // Group, Private
            $table->json('selected_addons')->nullable()->after('trip_type');
            $table->text('dietary_requirements')->nullable()->after('special_requirements');
            $table->string('emergency_contact')->nullable()->after('dietary_requirements');
            $table->text('internal_notes')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_tours', function (Blueprint $table) {
            $table->dropColumn([
                'adults',
                'children',
                'package_tier',
                'trip_type',
                'selected_addons',
                'dietary_requirements',
                'emergency_contact',
                'internal_notes',
            ]);
        });
    }
};
