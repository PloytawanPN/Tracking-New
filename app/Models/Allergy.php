<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allergy extends Model
{
    use HasFactory;

    protected $table = 'allergies';

    protected $fillable = [
        'pet_code',
        'allergy_name',
        'symptoms',
    ];
}
