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
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->string('pet_code')->unique();
            $table->string('qr_data');
            $table->integer('active_st');
            $table->dateTime('active_at')->nullable();
            $table->integer('export_st');
            $table->dateTime('export_at')->nullable();
            
            $table->integer('produce_st');
            $table->dateTime('produce_at')->nullable();

            $table->integer('sold_st');
            $table->dateTime('sold_at')->nullable();

            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
