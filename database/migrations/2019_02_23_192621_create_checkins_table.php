<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('cadastros')->onDelete('cascade');
            $table->boolean('acompanhante');
            $table->integer('numeroacompanhantes')->nullable();
            $table->char('tipoacomodacao', 10);
            $table->boolean('transfer');
            $table->string('aeroporto', 20)->nullable();
            $table->string('horario', 20)->nullable();
            $table->string('horariovolta', 20)->nullable();
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('checkins');
    }
}
