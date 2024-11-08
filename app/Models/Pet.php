<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'pet_code',
        'owner_id',
        'pet_image',
        'pet_name',
        'pet_type',
        'species_other',
        'pet_breed',
        'pet_gender',
        'pet_birthday',
        'pet_colorMark',
        'pet_lat',
        'pet_lng',
        'emergency_contact'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
