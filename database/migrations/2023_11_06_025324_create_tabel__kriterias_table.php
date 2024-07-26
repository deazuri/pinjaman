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
        Schema::create('tabel__kriterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_kr');
            $table->string('kriteria');
            $table->enum('keterangan',['Cost','Benefit']);
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
        Schema::dropIfExists('tabel__kriterias');
    }
};
