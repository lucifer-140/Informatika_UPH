<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('meal_name');
            $table->dateTime('meal_date');
            $table->string('image_url')->nullable();
            $table->float('total_calories')->default(0);
            $table->float('total_protein')->default(0);
            $table->float('total_carbs')->default(0);
            $table->float('total_fat')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
