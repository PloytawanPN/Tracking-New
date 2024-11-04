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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code');
            $table->string('name');
            $table->string('lastname');
            $table->string('phone');
            $table->dateTime('order_at');
            $table->integer('payment_st');
            $table->integer('quantity');
            $table->float('total_item_price');
            $table->string('shipping_company')->nullable();
            $table->dateTime('shipping_at')->nullable();
            $table->string('tracking_number')->nullable();
            $table->text('shipping_address')->nullable();
            $table->float('shipping_fee')->nullable();
            $table->float('total_w_shipping')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
