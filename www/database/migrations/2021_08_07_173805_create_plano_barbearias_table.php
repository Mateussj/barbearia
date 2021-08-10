<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanoBarbeariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_barbearias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_plano')->coment('Id do plano da barbearia');
            $table->dateTime('data_contratacao')->coment('Data da contratação');
            $table->dateTime('data_renovacao')->coment('Data da renovação do plano');
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
        Schema::dropIfExists('plano_barbearias');
    }
}
