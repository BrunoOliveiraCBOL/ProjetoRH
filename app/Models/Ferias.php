<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferias extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id',
        'id_matricula',
        'data_inicio',
        'dias_ferias',
        'status',
    ];


}
