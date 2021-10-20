<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller{
    public function __construct(){

        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create', 'store');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.destroy')->only('destroy');


        $this->middleware('can:admin.roles.general.create')->only('create', 'store');
        $this->middleware('can:admin.roles.general.store');
        $this->middleware('can:admin.roles.general.destroy');
    }
 
    public function index()
    {
        $users = User::all();
        $roles= Role::all();
        return view('admin.role.index', compact('users', 'roles'));
    }
    public function editgeneral(Role $role)
    {
        $persmissions = Permission::all();
        return view('admin.role.general.edit', compact('role', 'persmissions'));
    }
    public function updategeneral(Request $request, Role $role)
    {
        $request->validate(['name' => 'required']);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('info', 'El rol fue actualizado satisfactoriamente');
    }
    public function destroygeneral(Role $role)
    {
        $role->delete($role);
        return redirect()->route('admin.roles.index')->with('info', 'El rol fue eliminado satisfactoriamente');
    }
    public function creategeneral()
    {
        $persmissions = Permission::all();
        return view('admin.role.general.create', compact('persmissions'));
    }
    public function storegeneral(Request $request)
    {
        $request->validate(['name' => 'required']);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('info', 'El rol se ha creado con exito');
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.role.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.roles.index', $user)->with('info', 'Se asigno los roles correctamente');
    }

    public function destroy(User $user)
    {
        //
    }
}
