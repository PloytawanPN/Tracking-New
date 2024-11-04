<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales'; 

    protected $fillable = [
        'invoice_code',
        'name',
        'lastname',
        'phone',
        'order_at',
        'payment_st',
        'quantity',
        'total_item_price',
        'shipping_company',
        'shipping_at',
        'tracking_number',
        'shipping_address',
        'shipping_fee',
        'total_w_shipping',
    ];
}
