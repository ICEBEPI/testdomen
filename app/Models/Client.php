<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $guarded;

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}


