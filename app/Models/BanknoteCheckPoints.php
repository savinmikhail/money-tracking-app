<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanknoteCheckPoints extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'comment',
        'image_path',
    ];
}
