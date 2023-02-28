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
        Schema::create('dokumen_pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pengajuan')->unsigned();
            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('file_npwp')->nullable();
            $table->string('file_invoice')->nullable();
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
        Schema::dropIfExists('dokumen_pengajuan');
    }
};