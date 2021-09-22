<?php

namespace App\Http\Controllers\Admin\Tickets;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.ticket.users.index');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.ticket.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.ticket.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $newuser = array(
            'name' => $request->name,
            'email' => $request->email,
            'password'    => Hash::make($request->pass)
        );
        $user->update($newuser);
        return redirect()->route('admin.ticket.users.index', $user)->with('info', 'El usuario se edito correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete($user);
        return redirect()->route('admin.ticket.users.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
