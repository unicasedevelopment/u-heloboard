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
        Schema::create('pengajuan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_pengajuan');
            $table->bigInteger('id_kategori')->unsigned();
            $table->bigInteger('id_creator')->unsigned();
            $table->bigInteger('id_divisi')->unsigned();
            $table->bigInteger('id_metode')->unsigned();
            $table->string('status_approval_1');
            $table->string('status_approval_2');
            $table->text('keperluan');
            $table->string('status_pangajuan');
            $table->string('status_pemrosesan');
            $table->string('invoice');
            $table->string('npwp');
            $table->string('ktp');
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
        Schema::dropIfExists('pengajuan_dana');
    }
};