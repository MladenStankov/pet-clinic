<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    public function pet(): BelongsTo
    {
        return $this->BelongsTo(Pet::class);
    }

    protected $fillable = [
        'pet_id',
        'date',
        'reason',
    ];
}
