<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlujoTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flujo_tramite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tipo_tramite')->unsigned();
            $table->smallInteger('orden');
            $table->time('tiempo');
            $table->char('estado',1);
            $table->string('id_programa', 5);
            $table->timestamps();

            $table->foreign('id_tipo_tramite')->references('id')->on('tipo_tramite')->onUpdate('cascade');
            $table->foreign('id_programa')->references('id_programa')->on('programas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flujo_tramite');
    }
}
