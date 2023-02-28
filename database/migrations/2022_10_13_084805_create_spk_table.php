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
        Schema::create('spk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('divisi');
            $table->date('tgl_pengajuan');
            $table->string('tempat_berangkat');
            $table->date('tgl_berangkat');
            $table->string('transportasi balik');
            $table->string('tempat_balik');
            $table->date('tgl_balik');
            $table->string('transportasi_balik');
            $table->text('tujuan');
            $table->text('durasi');
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
        Schema::dropIfExists('spk');
    }
};