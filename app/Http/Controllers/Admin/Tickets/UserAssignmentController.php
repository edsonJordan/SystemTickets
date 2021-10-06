<?php

namespace App\Http\Controllers\Admin\tickets;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Http\Request;

class UserAssignmentController extends Controller
{

    public function index()
    {
        $UserAssignments = UserAssignment::all();
        return view('admin.ticket.userassignments.index', compact('UserAssignments'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        $tickets = Ticket::all('user_id', 'tittle', 'id');
        return view('admin.ticket.userassignments.create', compact('users', 'tickets'));
    }


    public function store(Request $request)
    {
        //return $request;
        foreach ($request->ticket_id as $req){
            UserAssignment::create([                
                'user_id'     => $request->user_id,
                'ticket_id'   => $req
            ]);
        }   
         
        return redirect()->route('admin.ticket.userassignments.index')->with('info', 'El ticket ha sido asignado correctamente');
    }


    public function show(UserAssignment $userAssignment)
    {
        //
    }

    public function edit(UserAssignment $userAssignment)
    {
        //
    }


    public function update(Request $request, UserAssignment $userAssignment)
    {
        //
    }

    public function destroy(UserAssignment $userassignment)
    {
       
        $userassignment->delete($userassignment);
        return redirect()->route('admin.ticket.userassignments.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
