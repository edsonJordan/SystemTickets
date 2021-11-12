<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\ticket;
use Illuminate\Http\Request;
use App\Models\GroupSupport;
use App\Models\TicketPriority;
use App\Models\TicketStatus;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = GroupSupport::select('group', 'id')->get();
        $priority = TicketPriority::pluck('priority', 'id');
        return view('ticket.create', compact('groups', 'priority'));
    }

    public function store(Request $request)
    {   
        if(is_null($request->group_id)){
            Ticket::create([
                'user_id' => auth()->id(),
                'typeticket_id' => 2,//2 = tipo de ticket de soporte -> web
                'priority_id' => $request->priority_id,
                'status_id' => 1,//Pendiente
                'tittle' => $request->tittle,
                'description' => $request->description,
            ]);
        }else{
            Ticket::create([
                'user_id' => auth()->id(),
                'typeticket_id' => 2,//2 = tipo de ticket de soporte -> web
                'priority_id' => $request->priority_id,
                'status_id' => 3,//Asignado
                'tittle' => $request->tittle,
                'description' => $request->description,
            ]);
            Assignment::create([
                'ticket_id' => Ticket::all()->last()->id,
                'group_id' => $request->group_id,
            ]);
        }
        return redirect()->route('dashboard'); ;
    }

    public function show(ticket $ticket)
    {
        //
    }

    public function edit(ticket $ticket)
    {
        //
    }

    public function update(Request $request, ticket $ticket)
    {
        //
    }

    public function destroy(ticket $ticket)
    {
        //
    }
}
