<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetHealthRecord extends Model
{
    use HasFactory;

    protected $table = 'pet_health_records';

    // กำหนดคอลัมน์ที่สามารถกรอกข้อมูลได้
    protected $fillable = [
        'pet_code',
        'neutered_status',
        'health_allergies',
        'care_instruction'
    ];

    protected $casts = [
        'health_allergies' => 'string',
        'care_instruction' => 'string',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_code', 'pet_code');
    }
}
