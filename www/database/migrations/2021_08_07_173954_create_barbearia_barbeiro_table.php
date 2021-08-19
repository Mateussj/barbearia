<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbeariaBarbeiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /*
        Tabela auxilar que liga o Barbeiro a Barbearia.
     */
    
    public function up()
    {
        Schema::create('barbearia_barbeiro', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('barbearia_barbeiro');
    }
}
