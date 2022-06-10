<?php

namespace App\Http\Controllers;

use App\Models\Holerite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $holerites = Holerite::where(function ($query) use ($search) {
            if($search){
                $query->Where('mes_referente', $search);
                $query->orWhere('id_matricula', $search);
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
        
        $data = $request->all();

            if($request->file->isValid()){

                $file = $request->file->store('holerites');
                $data['file'] = $file;
            }

        
        Holerite::create($data);
        
        return redirect()->route('holerites.index')
            ->with('success','Upload efetuado com sucesso.');

    }
    
    
    public function destroy(Holerite $holerite)
    {
        $holerite->delete();
        Storage::delete($holerite->file);
       
        return redirect()->route('holerites.index')
                        ->with('success','Holerite deletado com sucesso');
    }
}