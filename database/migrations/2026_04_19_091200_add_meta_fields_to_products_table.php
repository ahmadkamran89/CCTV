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
        Schema::table('products', function (Blueprint $table) {
            $table->string('resolution')->nullable()->after('description');
            $table->string('night_vision')->nullable()->after('resolution');
            $table->string('weatherproof')->nullable()->after('night_vision');
            $table->string('storage')->nullable()->after('weatherproof');
            $table->json('features')->nullable()->after('storage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['resolution', 'night_vision', 'weatherproof', 'storage', 'features']);
        });
    }
};
