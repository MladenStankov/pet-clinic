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
        Schema::table('pets', function (Blueprint $table) {
            if (!Schema::hasColumn('pets', 'owner_id')) {
                $table->foreignId('owner_id')->constrained()->cascadeOnDelete();
            }
        });

        Schema::table('appointments', function (Blueprint $table) {
            if (!Schema::hasColumn('pet', 'pet_id')) {
                $table->foreignId('pet_id')->constrained()->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
