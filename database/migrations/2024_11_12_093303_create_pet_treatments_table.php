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
        Schema::create('pet_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('pet_code');
            $table->text('diagnosis');
            $table->text('treatment');
            $table->text('medications')->nullable();
            $table->date('treatment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_treatments');
    }
};
