<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'table_id', 'nomcli', 'unite', 'typecom', 'datecom']; // colonnes autoriser a etre rempli

    public function tables(): BelongsTo // foreign key: table_id
    {
        return $this->belongsTo(related: Table::class);
    }

    public function menus(): BelongsTo // foreign key: menu_id
    {
        return $this->belongsTo(related: Menu::class);
    }
}
