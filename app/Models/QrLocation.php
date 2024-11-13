<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class QrLocation extends Model
{
    use HasFactory;
    protected $table = 'qr_location';

    protected $fillable = [
        'pet_code',
        'qr_lat',
        'qr_lng',
    ];
}
