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
        Schema::create('datkers', function (Blueprint $table) {
            $table->bigIncrements('id_kriteria');
            $table->string('nama_kriteria');
            $table->integer('bobot');
            $table->integer('poin1');
            $table->integer('poin2');
            $table->integer('poin3');
            $table->integer('poin4');
            $table->integer('poin5');
            $table->enum('sifat',['Cost','Benefit']);
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
        Schema::dropIfExists('datkers');
    }
};
