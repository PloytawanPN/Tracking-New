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
        Schema::create('production_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('order_name');
            $table->text('order_detail')->nullable();
            $table->string('order_channel');
            $table->integer('order_quantity');
            $table->float('total_price');
            $table->float('unit_price');
            $table->float('shipping_cost');
            $table->dateTime('order_at');
            $table->dateTime('received_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_order');
    }
};
