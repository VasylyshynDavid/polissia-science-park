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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title_ua', 60);         // Назва напряму (макс. 60 символів)
            $table->string('title_en', 60);         // Назва англійською (макс. 60 символів)
            $table->string('description_ua', 180);  // Опис напряму (макс. 180 символів)
            $table->string('description_en', 180);  // Опис англійською (макс. 180 символів)
            $table->string('image_path');           // Шлях до іконки
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
