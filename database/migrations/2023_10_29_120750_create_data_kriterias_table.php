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
        Schema::create('data_kriterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_pemohon')->references('id')->on ('pemohons')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pendapatan');
            $table->string('plafond');
            $table->string('jw');
            $table->string('angsuran');
            $table->string('jaminan');
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
        Schema::dropIfExists('data_kriterias');
    }
};
