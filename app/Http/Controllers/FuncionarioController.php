<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $funcionarios = Funcionario::latest()->get();
      
        return view('funcionarios.index',compact('funcionarios'))
                ->with('i', (request()->input('page', 1) - 1) * 5);


                /*
        $search = request('search');

        if($search){

            $funcionarios = Funcionario::where([
                ['nome', 'like','%'.$search.'%']
            ])->get();
        }else{
            $funcionarios = Funcionario::all();
        }

        return view('funcionarios.index',['funcionarios'=> $funcionarios, 'search' => $search]);
    
        */
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
       
        return redirect()->route('funcionarios.index')
                        ->with('success','Funcionário cadastrado com Sucesso.');
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
            'matricula' => 'required',
        ]);
      
        $funcionario->update($request->all());
      
        return redirect()->route('funcionarios.index')
                        ->with('success','Registro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
       
        return redirect()->route('funcionarios.index')
                        ->with('success','Registro deletado com sucesso');
    }
   


}


