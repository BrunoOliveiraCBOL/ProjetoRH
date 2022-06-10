<?php

namespace App\Http\Controllers;

use App\Models\Ferias;
use Illuminate\Http\Request;

class FeriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $ferias = Ferias::where(function ($query) use ($search) {
            if($search){
               $query->orWhere('id_matricula', $search);
            }
        })->paginate(20);

        return view('ferias.index',compact('ferias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ferias.create');
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
            'id_matricula' => 'required',
            'data_inicio' => 'required',
            'dias_ferias' => 'required',
            'status' => 'required',
            
        ]);
      
        Ferias::create($request->all());
       
        return redirect()->route('ferias.index')
                        ->with('success','Agendamento de Férias cadastrado. Aguarde aprovação  do RH.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
