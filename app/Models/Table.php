<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['designation', 'occupation']; // colonnes autoriser a remplir

    public function commandes(): HasMany // foreign key de commandes
    {
        return $this->hasMany(related: Commande::class);
    }

    public function reservers(): HasMany // foreign key de reservers
    {
        return $this->hasMany(related: Reserver::class);
    }
}
