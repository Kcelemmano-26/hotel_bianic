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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom du client
            $table->string('email'); // Email du client
            $table->string('telephone'); // Téléphone du client
            $table->string('chambre'); // Chambre réservée
            $table->date('arrivee'); // Date d'arrivée
            $table->date('depart'); // Date de départ
            $table->integer('personnes'); // Nombre de personnes
            $table->integer('nombre_enfants')->nullable(); // Nombre d'enfants, facultatif
            $table->text('message')->nullable(); // Message facultatif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
