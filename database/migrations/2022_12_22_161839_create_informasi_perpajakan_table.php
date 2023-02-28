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
        Schema::create('informasi_perpajakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pengajuan')->unsigned();
            $table->bigInteger('id_jenis_pajak')->unsigned();
            $table->string('status_pajak');
            $table->timestamps();
            $table->foreign('id_jenis_pajak')
            ->references('id')
            ->on('jenis_pajak')
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
        Schema::dropIfExists('informasi_perpajakan');
    }
};