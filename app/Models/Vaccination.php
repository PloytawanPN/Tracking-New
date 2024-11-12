<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaccination extends Model
{
    use HasFactory;
    protected $table = 'vaccinations';

    protected $fillable = [
        'pet_code',
        'vaccine_name',
        'vaccination_date',
        'next_appointment',
    ];

    protected $dates = [
        'vaccination_date',
        'next_appointment',
    ];
}
