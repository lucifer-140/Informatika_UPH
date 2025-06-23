<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nutrition_sources', function (Blueprint $table) {
            $table->id();
            $table->string('ingredient_name')->unique();
            $table->float('calories_per_100g');
            $table->float('protein_per_100g');
            $table->float('carbs_per_100g');
            $table->float('fat_per_100g');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_sources');
    }
};
