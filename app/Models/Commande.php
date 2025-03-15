<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function tables(): BelongsTo
    {
        return $this->belongsTo(related: Table::class);
    }
    public function menus(): BelongsTo
    {
        return $this->belongsTo(related: Menu::class);
    }
}
