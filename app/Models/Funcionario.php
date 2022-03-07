<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id',
        'nome',
        'sexo',
        'data_nascimento',
        'estado_civil',
        'telefone',
        'email',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'pais',
        'tipo_contratacao',
        'data_admissao',
        'cargo',
        'area',
        'salario',
    ];


}
