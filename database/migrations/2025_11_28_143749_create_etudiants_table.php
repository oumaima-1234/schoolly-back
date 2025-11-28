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
    Schema::create('etudiants', function (Blueprint $table) {
        $table->id();
        $table->string('Nom');
        $table->string('Prenom');
        $table->string('Grade');
        $table->string('Class');
        $table->float('GPA');
        $table->integer('Attendance');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
};
