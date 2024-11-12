<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetDisease extends Model
{
    use HasFactory;
    protected $table = 'pet_diseases';

    protected $fillable = [
        'disease_name',
        'pet_code',
        'date_diagnosed',
    ];
}
