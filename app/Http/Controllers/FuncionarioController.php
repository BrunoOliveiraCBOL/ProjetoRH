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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $search = $request->search;
        $funcionarios = Funcionario::where(function ($query) use ($search) {
            if($search){
                $query->where('nome', 'LIKE', "%{$search}%");
                $query->orWhere('id', $search);
            }
        })->paginate(20);

        return view('funcionarios.index',compact('funcionarios'));
    }


        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'id' => 'required',
            'nome' => 'required',
            'sexo' => 'required',
            'data_nascimento' => 'required',
            'estado_civil' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'pais' => 'required',
            'tipo_contratacao' => 'required',
            'data_admissao' => 'required',
            'cargo' => 'required',
            'area' => 'required',
            'salario' => 'required',
             
        ]);
        
        
        Funcionario::create($request->all());
        
        //Parte de cadastrar o usuario

        $grupo = $request->grupo;

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'id' => $request->id,
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole($grupo);
        
        $user->assignRole('user');

        event(new Registered($user));
        
       
        return redirect()->route('funcionarios.index')
                        ->with('success','Colaborador cadastrado com Sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show',compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit',compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required',
            'id' => 'required',
        ]);
      
        $funcionario->update($request->all());
      
        return redirect()->route('funcionarios.index')
                        ->with('success','Colaborador atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {

        $id = $funcionario->id;
        $funcionario->delete();
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        
        return redirect()->route('funcionarios.index')
                        ->with('success','Colaborador deletado com sucesso');
    }
   
    public function reset(Funcionario $funcionario)
    {
        $id = $funcionario->id;
        $password = Hash::make('123456789');
      
        DB::table('users')->where('user_id',$id)->update(array(
                                                    'password'=>$password,
        ));
      
        return redirect()->route('funcionarios.index')
                        ->with('success','Senha resetada com sucesso.');
    }

}


