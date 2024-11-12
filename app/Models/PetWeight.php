<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetWeight extends Model
{
    use HasFactory;

    protected $table = 'pet_weights';
    protected $fillable = [
        'pet_code', 
        'weight', 
        'measurement_date',
    ];

    
    protected $dates = ['measurement_date'];
}
