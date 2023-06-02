<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanknoteCheckpoint extends Model
{
    use HasFactory;

//    protected $table = 'banknote_checkpoint';
    protected $fillable = [
        'latitude',
        'longitude',
        'comment',
        'image_path',
        'banknote_id',
    ];
}
