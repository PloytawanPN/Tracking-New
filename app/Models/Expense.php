<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $fillable = [
        'expense_name',
        'amount',
        'payment_date',
        'payment_method',
    ];
}
