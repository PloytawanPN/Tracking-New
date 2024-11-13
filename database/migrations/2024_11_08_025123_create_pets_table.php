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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('pet_code');
            $table->string('owner_id');
            $table->string('pet_image');
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('species_other')->nullable();
            $table->string('pet_breed');
            $table->string('pet_gender');
            $table->dateTime('pet_birthday');
            $table->string('pet_colorMark');
            $table->string('pet_lat');
            $table->string('pet_lng');
            $table->integer('missing_st')->default(0);
            $table->string('emergency_contact')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
