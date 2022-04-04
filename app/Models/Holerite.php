<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holerite extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id',
        'id_matricula',
        'mes_referente',
        'file',
    ];


}
