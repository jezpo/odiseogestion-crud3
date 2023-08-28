<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cite');
            $table->text('descripcion');
            $table->string('estado');
            $table->string('hash', 255);
            $table->integer('id_tipo_documento');
            $table->binary('documento');
            $table->string('id_programa', 5);
            $table->timestamps();


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
        Schema::dropIfExists('documentos');
    }
}
