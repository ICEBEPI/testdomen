<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeEngine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function engines(): HasMany
    {
        return $this->hasMany(Engine::class);
    }
}
