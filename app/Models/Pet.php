<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pet extends Model
{
    public function owner(): HasOne
    {
        return $this->hasOne(Owner::class);
    }
    protected $fillable = [
        'owner_id',
        'name',
        'species',
    ];
}
