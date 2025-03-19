<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id(); // Colonne pour l'identifiant unique
            $table->foreignIdFor(model:\App\Models\Menu::class)->nullable()->constrained()->onDelete('set null'); // foreign key menu_id, si supp -> null
            $table->foreignIdFor(model:\App\Models\Table::class)->nullable()->constrained()->onDelete('set null'); // foreign key table_id, si supp -> null
            $table->string('nomcli'); // Nom du client
            $table->string('typecom'); // sur table ou a emporter
            $table->date('datecom'); // date de commande (YYYY-MM-DD)
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
