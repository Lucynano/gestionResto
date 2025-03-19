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
        Schema::create('reservers', function (Blueprint $table) {
            $table->id(); // Colonne pour l'identifiant unique
            $table->foreignIdFor(model:\App\Models\Table::class)->nullable()->constrained()->onDelete('set null'); // foreign key table_id, si supp -> null
            $table->string('nomcli'); // Nom du client
            $table->dateTime('date_de_reserv'); //  date de reservation, equivaut a updated_at, dateTime de format (YYYY-MM-DD hh:mm:ss)
            $table->dateTime('date_reserve'); // dateTime de format (YYYY-MM-DD hh:mm:ss)
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservers');
    }
};
