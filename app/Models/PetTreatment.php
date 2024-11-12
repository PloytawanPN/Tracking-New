<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetTreatment extends Model
{
    use HasFactory;
    protected $table = 'pet_treatments';
    protected $fillable = [
        'pet_code',
        'diagnosis',
        'treatment',
        'medications',
        'treatment_date',
    ];

    protected $dates = ['treatment_date'];
}
