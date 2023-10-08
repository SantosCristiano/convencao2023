<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompanhantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanhantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('cadastros')->onDelete('cascade');
            $table->string('nomeparticipante', 60)->nullable();
            $table->string('rgparticipante', 20)->nullable();
            $table->string('cpfparticipante', 20)->nullable();
            $table->string('datanascimento', 15)->nullable();
            $table->boolean('franqueadoparticipante')->nullable();
            $table->double('valorparticipante', 10,2)->nullable();
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
        Schema::dropIfExists('acompanhantes');
    }
}
