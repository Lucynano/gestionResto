<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserver extends Model
{
    use HasFactory;

    protected $fillable = ['table_id', 'nomcli', 'date_de_reserv', 'date_reserve']; // colonnes autoriser a etre rempli

    public function table(): BelongsTo // foreign key table_id
    {
        return $this->belongsTo(related: Table::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->date_de_reserv = now(); // Met à jour date_de_reserv en même temps qu'updated_at
        });
    }
}
