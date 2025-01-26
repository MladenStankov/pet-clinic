<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }
    protected $fillable = [
        'pet_id',
        'name',
        'contact_info',
    ];
}
