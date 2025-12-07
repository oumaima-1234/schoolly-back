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
        $table->string('Nom')->default("NULL");
        $table->string('Prenom')->default("NULL");
        // $table->string('Grade');
        // database/migrations/xxxx_create_users_table.php
$table->string('role')->default('student'); // ou 'professeur' ou 'directeur'
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        $table->string('Class')->default("NULL");
        $table->float('GPA')->default(0);
        $table->integer('Attendance')->default(0);
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
