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
        Schema::create('perjalanan_dinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat');
            $table->string('no_surat_tugas');
            $table->string('nama');
            $table->string('nik');
            $table->string('jabatan');
            $table->string('departemen');
            $table->string('tujuan');
            $table->bigInteger('durasi_hari');
            $table->bigInteger('durasi_malam');
            $table->string('lokasi_keberangkatan');
            $table->string('tgl_keberangkatan');
            $table->string('transportasi_keberangkatan');
            $table->string('lokasi_kedatangan');
            $table->string('tgl_kedatangan');
            $table->string('transportasi_kedatangan');
            $table->text('catatan_tambahan');
            $table->string('ttd_pemohon');
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
        Schema::dropIfExists('perjalanan_dinas');
    }
};