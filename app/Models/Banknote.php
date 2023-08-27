<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BanknoteCheckpoint;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Banknote extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial_number',
        'price',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function checkpoints(): HasMany
    {
        return $this->hasMany(BanknoteCheckpoint::class);
    }

}
