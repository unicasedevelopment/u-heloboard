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
        Schema::create('informasi_detail_refund', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pengajuan')->unsigned();
            $table->string('no_invoice')->nullable();
            $table->string('no_retur')->nullable();
            $table->string('alasan_refund')->nullable();
            $table->string('no_inv_pengganti')->nullable();
            $table->string('pilihan_cashback')->nullable();
            $table->text('barcode_barang')->nullable();
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
        Schema::dropIfExists('informasi_detail_refund');
    }
};