<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosAssistidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_assistidos', function (Blueprint $table) {
            $table->string('idVideo');
            $table->integer('idUser')->unsigned();

            $table->foreign('idUser')->references('id')->on('users');
            $table->unique(['idVideo', 'idUser'], 'index_videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos_assistidos');
    }
}
