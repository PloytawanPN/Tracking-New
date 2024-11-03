<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderList extends Model
{
    use HasFactory;
    protected $table = 'order_list';
    protected $fillable = [
        'production_order_id',
        'pet_code',
    ];
}
