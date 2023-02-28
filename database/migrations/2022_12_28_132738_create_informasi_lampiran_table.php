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
        Schema::create('informasi_lampiran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pengajuan')->unsigned();
            $table->string('nama_lampiran');
            $table->string('file_lampiran');
            $table->timestamps();
            $table->foreign('id_pengajuan')
            ->references('id')
            ->on('pengajuan_dana')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_lampiran');
    }
};