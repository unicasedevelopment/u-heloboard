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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_arsip');
            $table->date('tgl_dikirim');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->string('penerima');
            $table->text('resume')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('file_surat')->nullable();
            $table->bigInteger('id_jenis')->unsigned();
            $table->bigInteger('id_divisi')->unsigned();
            $table->foreign('id_jenis')
            ->references('id')
            ->on('jenis_surat')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_divisi')
            ->references('id')
            ->on('divisi')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('surat_keluar');
    }
};