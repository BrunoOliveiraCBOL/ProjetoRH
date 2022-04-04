<?php

namespace App\Http\Controllers;

use App\Models\Holerite;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $holerites = Holerite::where(function ($query) use ($search) {
            if($search){
                $query->Where('mes_referente', $search);
            }
        })->paginate(20);
        return view('holerites.index',compact('holerites'));
    }
    
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([

            'id_matricula' => 'required',
            'mes_referente' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
    
        $fileName = time().'.'.$request->file->extension();  
     
        $request->file->move(public_path('uploads'), $fileName);
   
        Holerite::create($request->all());
     
        return redirect()->route('holerites.index')
            ->with('success','Upload de Holerite efetuado com sucesso.')
            ->with('file', $fileName);

    }

    public function show(Holerite $holerite)
    {
        
        return view('holerites.show',compact('holerite'));
    }


}
