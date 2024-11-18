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
        Schema::create('card_styles', function (Blueprint $table) {
            $table->id();
            $table->string('pet_code');
            $table->string('header_color')->nullable();
            $table->string('h_colorcode')->nullable();
            $table->string('button_color')->nullable();
            $table->string('b_colorcode')->nullable();
            $table->string('card_image')->nullable();
            $table->string('bg_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_styles');
    }
};
