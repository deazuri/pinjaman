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
        Schema::create('jaminans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->foreignId('id_pemohon')->references('id')->on ('pemohons')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_jaminan');
            $table->foreignId('id_kriteria')->references('id')->on ('data_kriterias')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jaminans');
    }
};
