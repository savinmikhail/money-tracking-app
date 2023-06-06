<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BanknoteCheckpoint;
class Banknote extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial_number',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function checkpoints()
    {
        return $this->hasMany(BanknoteCheckpoint::class);
    }

}
