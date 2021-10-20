<?php

namespace App\Http\Controllers\Admin\Tickets;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreUserRequest;
use App\Http\Requests\Admin\Ticket\UpdateUserRequest;
use App\Models\Area;
use App\Models\GroupSupport;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('can:admin.ticket.users.index')->only('index');
        $this->middleware('can:admin.ticket.users.create')->only('create', 'store');
        $this->middleware('can:admin.ticket.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.ticket.users.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.ticket.users.index');
    }

    public function create()
    {
        $areas = Area::pluck('area', 'id');
        $groups = GroupSupport::pluck('group', 'id');
        $types = TypeUser::pluck('type_user', 'id');
        return view('admin.ticket.users.create', compact('areas', 'groups', 'types'));
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());        
        return redirect()->route('admin.ticket.users.index')->with('info', 'El usuario se creo correctamente');
    }
    public function show(User $user)
    {
        return view('admin.ticket.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $areas = Area::pluck('area', 'id');
        $groups = GroupSupport::pluck('group', 'id');
        $types = TypeUser::pluck('type_user', 'id');
        return view('admin.ticket.users.edit', compact('user', 'areas', 'groups', 'types'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        /* $newuser = array(
            'name' => $request->name,
            'email' => $request->email,
            'password'    => Hash::make($request->pass)
        ); */
        /* if ($request->pass) {
        } */
        $user->update($request->all());
        //$user->update($newuser);
        return redirect()->route('admin.ticket.users.index', $user)->with('info', 'El usuario se edito correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete($user);
        return redirect()->route('admin.ticket.users.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
