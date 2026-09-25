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
        Schema::table('trending_treks', function (Blueprint $table) {
            $table->decimal('starting_price', 10, 2)->nullable()->after('height_meters');
            $table->string('starting_point')->nullable()->after('best_season'); // e.g. Islamabad / Skardu
            $table->string('ending_point')->nullable()->after('starting_point'); // e.g. Skardu / Islamabad
            $table->string('accommodation_type')->nullable()->after('ending_point'); // e.g. Hotel & Mountain Camping
            $table->string('transport_type')->nullable()->after('accommodation_type'); // e.g. 4x4 Jeep & Domestic Flight
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trending_treks', function (Blueprint $table) {
            $table->dropColumn([
                'starting_price',
                'starting_point',
                'ending_point',
                'accommodation_type',
                'transport_type',
            ]);
        });
    }
};
