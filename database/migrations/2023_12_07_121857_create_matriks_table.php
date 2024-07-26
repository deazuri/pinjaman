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
        Schema::create('matriks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_kriteria')->references('id')->on ('data_kriterias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_pemohon')->references('id')->on ('pemohons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_bobot_kriteria')->references('id')->on ('kriterias')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nilai');
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
        Schema::dropIfExists('matriks');
    }
};
