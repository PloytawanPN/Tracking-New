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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('email_show_st')->default(1);
            $table->string('password');
            $table->string('fullname');
            $table->integer('fullname_show_st')->default(1);
            $table->string('nickname');
            $table->integer('nickname_show_st')->default(1);
            $table->string('contact');
            $table->integer('contact_show_st')->default(1);
            $table->string('address');
            $table->integer('address_show_st')->default(1);
            $table->string('owner_image')->nullable();
            $table->integer('owner_image_show_st')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
