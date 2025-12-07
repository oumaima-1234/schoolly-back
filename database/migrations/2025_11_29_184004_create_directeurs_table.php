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
    Schema::create('directeurs', function (Blueprint $table) {
        $table->id();
        $table->string('Nom');
        $table->string('Prenom');
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
          $table->string('Telephone');
        $table->string('Bureau');
        $table->string('CartePro');

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
        Schema::dropIfExists('directeurs');
    }
};
