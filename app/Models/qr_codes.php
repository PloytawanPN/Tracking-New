<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class qr_codes extends Model
{
    use HasFactory;
    protected $table = 'qr_codes';

    protected $fillable = [
        'pet_code',
        'qr_data',
        'active_st',
        'export_st',
        'active_at',
        'export_at',
        'status',
        'produce_st',
        'produce_at',
        'sold_st',
        'sold_at'
    ];
}
