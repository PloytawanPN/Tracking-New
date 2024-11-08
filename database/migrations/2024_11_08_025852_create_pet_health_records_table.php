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
        Schema::create('pet_health_records', function (Blueprint $table) {
            $table->id();
            $table->string('pet_code');
            $table->string('neutered_status');
            $table->text('health_allergies')->nullable();
            $table->text('care_instruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_health_records');
    }
};
