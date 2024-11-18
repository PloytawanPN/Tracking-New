<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardStyle extends Model
{
    use HasFactory;

    protected $table = 'card_styles';

    protected $fillable = [
        'pet_code',
        'header_color',
        'button_color',
        'card_image',
        'bg_image',
        'h_colorcode',
        'b_colorcode',
    ];
}
