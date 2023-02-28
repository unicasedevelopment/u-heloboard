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
        Schema::create('informasi_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pengajuan')->unsigned();
            $table->bigInteger('id_metode')->unsigned();
            $table->string('provider');
            $table->string('no_payment');
            $table->string('penerima');
            $table->float('nominal');
            $table->timestamps();
            $table->foreign('id_metode')
            ->references('id')
            ->on('metode_pembayaran')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('informasi_pembayaran');
    }
};