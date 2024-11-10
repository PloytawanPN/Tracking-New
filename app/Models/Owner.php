<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'owners';

    protected $fillable = [
        'email',
        'email_show_st',
        'password',
        'fullname',
        'fullname_show_st',
        'nickname',
        'nickname_show_st',
        'contact',
        'contact_show_st',
        'address',
        'address_show_st',
        'owner_image',
        'owner_image_show_st',
        'remember_token',
    ];

    protected $casts = [
        'email_show_st' => 'boolean',
        'fullname_show_st' => 'boolean',
        'nickname_show_st' => 'boolean',
        'contact_show_st' => 'boolean',
        'address_show_st' => 'boolean',
        'owner_image_show_st' => 'boolean',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'owner_id');
    }
}
