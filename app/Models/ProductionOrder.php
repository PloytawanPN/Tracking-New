<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductionOrder extends Model
{
    use HasFactory;

    protected $table = 'production_order';

    protected $fillable = [
        'order_id',
        'order_name',
        'order_detail',
        'order_channel',
        'order_quantity',
        'total_price',
        'unit_price',
        'shipping_cost',
        'order_at',
        'received_at',
    ];

    

    public function orderLists()
    {
        return $this->hasMany(OrderList::class, 'production_order_id');
    }
}
