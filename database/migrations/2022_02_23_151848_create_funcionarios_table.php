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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('matricula');
            $table->string('nome',255);
            $table->string('sexo',20);
            $table->date('data_nascimento');
            $table->string('estado_civil',20);
            $table->string('telefone',20);
            $table->string('email',255);
            $table->string('cep',8);
            $table->string('logradouro',255);
            $table->string('numero',8);
            $table->string('complemento',255);
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('uf',50);
            $table->string('pais',50);
            $table->string('tipo_contratacao');
            $table->date('data_admissao');
            $table->string('cargo');
            $table->string('area');
            $table->double('salario',8,2);
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
        Schema::dropIfExists('funcionarios');
    }
};
