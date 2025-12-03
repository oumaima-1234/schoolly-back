<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('emploi_du_temps')) {
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->id();
            $table->string('jour');              // Lundi, Mardi...
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('class')->nullable();
            $table->string('professeur')->nullable();
            $table->string('matiere')->nullable();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emploi_du_temps');
    }
};
