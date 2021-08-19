<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicoAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /*
        
     */
    public function up()
    {
        Schema::create('servico_agenda', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_servico');
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
        Schema::dropIfExists('servico_agenda');
    }
}
