<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('ferias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_matricula');
            $table->string('data_inicio');
            $table->integer('dias_ferias');
            $table->string('status')->default('Em Análise');
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
        //
    }
};
