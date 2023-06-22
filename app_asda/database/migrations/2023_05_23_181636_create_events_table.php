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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nameEvent');
            $table->string('lieuEvent')->nullable();
            $table->date('date')->nullable();
            $table->string('description')->nullable();
        
            $table->timestamps();
        });

        Schema::create('event_avec_vente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->integer('nbreProdVend')->nullable();
            $table->float('Totale_vent')->nullable();
            $table->timestamps();
            
        });

        // Créer la table "event_sans_vente"
        Schema::create('event_sans_vente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->float('fraisEvent')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('event_avec_vente');
        Schema::dropIfExists('event_sans_vente');
        Schema::dropIfExists('events');
    }
};
