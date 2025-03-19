<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nomplat', 'pu']; // colonnes autoriser a etre rempli

    public function commandes(): HasMany // foreign key de commandes
    {
        return $this->hasMany(related: Commande::class);
    }
}
