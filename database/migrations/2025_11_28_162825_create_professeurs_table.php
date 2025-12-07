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
    Schema::create('professeurs', function (Blueprint $table) {
        $table->id();
        $table->string('Name')->default("NULL") ;
        $table->string('Email')->unique()->default("NULL");
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        $table->float('Salary')->default(0);
        $table->integer('Experience')->default(0); // عدّل Exprience إلى Experience لتصحيح الاسم
        $table->string('Department')->default("NULL");
        $table->string('Subject')->default("NULL");
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
        Schema::dropIfExists('professeurs');
    }
};
