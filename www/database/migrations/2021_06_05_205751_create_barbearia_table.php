<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbeariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barbearia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_plano_barbearia')->coment('Plano que a barbearia contratou');
            $table->string('nome');
            $table->string('descricao');
            $table->string('localizacao');
            $table->string('avatar');
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
        Schema::dropIfExists('barbearia');
    }
}
