<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function commandes(): HasMany
    {
        return $this->hasMany(related: Commande::class);
    }

    public function reservers(): HasMany
    {
        return $this->hasMany(related: Reserver::class);
    }
}
