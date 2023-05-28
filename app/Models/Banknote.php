<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banknote extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial_number',
        'price',
    ];
}
