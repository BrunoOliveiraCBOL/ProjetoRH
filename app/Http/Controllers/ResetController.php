<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ResetController extends Controller
{
    public function reset(Funcionario $funcionario)
    {
        $id = $funcionario->id;
        $password = Hash::make('123456789');
      
        DB::table('users')->where($id)->update(array(
                                                    'password'=>$password,
        ));
      
        return redirect()->route('funcionarios.index')
                        ->with('success','Senha resetada com sucesso.');
    }
}
