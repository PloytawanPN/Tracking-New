<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $table = 'sales_items';

    protected $fillable = [
        'invoice_id',
        'product_code',
        'price',
    ];

}
