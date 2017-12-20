<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edital', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lei')->unsigned();
            $table->string('ds_titulo', 100);
            $table->date('dt_edital');
            $table->string('st_edital', 1);
            $table->string('ds_link', 50);
            $table->char('st_registro_ativo');
            $table->foreign('id_lei')->references('id')->on('lei')->onDelete('cascade');
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
        Schema::dropIfExists('edital');
    }
}
