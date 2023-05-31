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
    public function getCheckpoint()
    {
        return $this->hasMany(BanknoteCheckpoint::class);
    }
}
