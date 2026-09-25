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
            $table->string('distance')->nullable()->after('height_meters');
            $table->string('best_season')->nullable()->after('distance');
            $table->json('included')->nullable()->after('best_season');
            $table->json('excluded')->nullable()->after('included');
            $table->json('packing_list')->nullable()->after('excluded');
            $table->json('itinerary')->nullable()->after('packing_list');
            $table->json('faqs')->nullable()->after('itinerary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trending_treks', function (Blueprint $table) {
            $table->dropColumn([
                'distance',
                'best_season',
                'included',
                'excluded',
                'packing_list',
                'itinerary',
                'faqs'
            ]);
        });
    }
};
