<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('roles.index', compact('roles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('roles.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = $request->new; 
        
        if(DB::table('roles')->where('name', $grupo)->count() != 0){

            return redirect()->route('roles.index')
                            ->with('success','Já existe um grupo com esse nome.');
        }

        else{
         
            $role = Role::firstOrCreate(['name' => $grupo]);
            
    
            $permissions= $request->campo;

            foreach($permissions as $valor){
                switch($valor){
                    case 1:
                        $role->givePermissionTo("criar_colaborador");
                        break;
                    case 2:
                        $role->givePermissionTo('visualizar_colaborador');
                        break;
                    case 3:
                        $role->givePermissionTo('editar_colaborador');
                        break;
                    case 4:
                        $role->givePermissionTo('deletar_colaborador');
                        break;
                    case 5:
                        $role->givePermissionTo('criar_holerite');
                        break;
                    case 6:
                        $role->givePermissionTo('visualizar_holerite');
                        break;
                    case 7:
                        $role->givePermissionTo('editar_holerite');
                        break;
                    case 8:
                        $role->givePermissionTo('deletar_holerite');
                        break;
                    case 9:
                        $role->givePermissionTo('criar_ferias');
                        break;
                    case 10:
                        $role->givePermissionTo('visualizar_ferias');
                        break;
                    case 11:
                        $role->givePermissionTo('editar_ferias');
                        break;        
                    case 12:
                        $role->givePermissionTo('deletar_ferias');
                        break;
                    case 13:
                        $role->givePermissionTo('criar_grupo');
                        break;
                    case 14:
                        $role->givePermissionTo('visualizar_grupo');
                        break; 
                    case 15:
                        $role->givePermissionTo('editar_grupo');
                        break;
                    case 16:
                        $role->givePermissionTo('deletar_grupo');
                        break;
                }
            }

            return redirect()->route('roles.index')
                            ->with('success','Novo Grupo criado com Sucesso.');
        }
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
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $allpermissions = $role->getAllPermissions();
        $role->revokePermissionTo($allpermissions);

        $permissions= $request->campo;

            foreach($permissions as $valor){
                switch($valor){
                    case 1:
                        $role->givePermissionTo("criar_colaborador");
                        break;
                    case 2:
                        $role->givePermissionTo('visualizar_colaborador');
                        break;
                    case 3:
                        $role->givePermissionTo('editar_colaborador');
                        break;
                    case 4:
                        $role->givePermissionTo('deletar_colaborador');
                        break;
                    case 5:
                        $role->givePermissionTo('criar_holerite');
                        break;
                    case 6:
                        $role->givePermissionTo('visualizar_holerite');
                        break;
                    case 7:
                        $role->givePermissionTo('editar_holerite');
                        break;
                    case 8:
                        $role->givePermissionTo('deletar_holerite');
                        break;
                    case 9:
                        $role->givePermissionTo('criar_ferias');
                        break;
                    case 10:
                        $role->givePermissionTo('visualizar_ferias');
                        break;
                    case 11:
                        $role->givePermissionTo('editar_ferias');
                        break;        
                    case 12:
                        $role->givePermissionTo('deletar_ferias');
                        break;
                    case 13:
                        $role->givePermissionTo('criar_grupo');
                        break;
                    case 14:
                        $role->givePermissionTo('visualizar_grupo');
                        break; 
                    case 15:
                        $role->givePermissionTo('editar_grupo');
                        break;
                    case 16:
                        $role->givePermissionTo('deletar_grupo');
                        break;
                }
            }

        

        return redirect()->route('roles.index')
                        ->with('success','Permissões alteradas com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $allpermissions = $role->getAllPermissions();
        $role->revokePermissionTo($allpermissions);

        $role->delete();

        return redirect()->route('roles.index')
                        ->with('success','Grupo deletado com sucesso');

    }
}
