<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlujoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flujo_documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_documento')->unsigned();
            $table->timestamp('fecha_recepcion');
            $table->string('id_programa', 5)->unique();
            $table->text('obs');
            $table->timestamps();

            //Llaves foraneas
            $table->foreign('id_documento')->references('id')->on('documentos');
            $table->foreign('id_programa')->references('id_programa')->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flujo_documentos');
    }
}
