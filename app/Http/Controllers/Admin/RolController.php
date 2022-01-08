<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//use function GuzzleHttp\Promise\all;

//use Illuminate\Validation\Rule;

class RolController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Rol')->only('index');

        $this->middleware('can:Crear Rol')->only('create', 'store');

        $this->middleware('can:Editar Rol')->only('edit', 'update');

        $this->middleware('can:Eliminar Rol')->only('destroy');        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'permissions.required' => 'Debe seleccionar al menos un permiso',
        ];
        $rules = [
            'name'=> array('required'),
            'permissions'=>array('required')
        ];
        
        $this->validate($request, $rules, $messages);

        /*$request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);*/

        $role = Role::create([
            'name' => $request->name
        ]);
        
        $role->permissions()->attach($request->permissions);
        
        $rol = $request->name;
        $notificacion="El rol $rol se ha añadido correctamente";

        return redirect()->route('admin.roles.index')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
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
        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'permissions.required' => 'Debe seleccionar al menos un permiso',
        ];
        $rules = [
            'name'=> array('required'),
            'permissions'=>array('required')
        ];
        
        $this->validate($request, $rules, $messages);
        
        $role->permissions()->sync($request->permissions);

        $role->update([
            'name' => $request->name
        ]);
   
        return redirect()->route('admin.roles.index')->with('notificacion', 'El rol se ha actualizado con correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        //$notificacion="El rol se ha eliminado correctamente";
        return redirect()->route('admin.roles.index')->with('notificacion', 'El rol se ha eliminado con correctamente');
    }
}
