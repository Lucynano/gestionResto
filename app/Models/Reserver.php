<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserver extends Model
{
    public function tables(): BelongsTo
    {
        return $this->belongsTo(related: Table::class);
    }
}
