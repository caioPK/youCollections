<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('idCollec');
            $table->integer('idUser')->unsigned();
            $table->string('nomeCollec', 40);
            $table->text('canais');
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users');
            $table->unique(['nomeCollec', 'idUser'], 'index_collec');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
