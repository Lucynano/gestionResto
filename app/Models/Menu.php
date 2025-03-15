<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function commandes(): HasMany
    {
        return $this->hasMany(related: Commande::class);
    }
}
