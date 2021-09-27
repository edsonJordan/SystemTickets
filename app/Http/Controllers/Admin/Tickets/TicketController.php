<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use App\Models\Ticket;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\TypeTicket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $typesticket = TypeTicket::pluck('type', 'id');
        $prioritys = TicketPriority::pluck('priority', 'id');
        $status = TicketStatus::pluck('status', 'id');
        return view('admin.ticket.tickets.create', compact('users', 'typesticket', 'prioritys', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        Ticket::create($request->all());        
        return redirect()->route('admin.ticket.tickets.index')->with('info', 'El área se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $users = User::pluck('name', 'id');
        $typestickets = TypeTicket::pluck('type', 'id');
        $prioritys = TicketPriority::pluck('priority', 'id');
        $status = TicketStatus::pluck('status', 'id');

        return view('admin.ticket.tickets.edit', compact('ticket', 'users', 'typestickets', 'prioritys', 'status'));
    }
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->route('admin.ticket.tickets.index')->with('info', 'El ticket se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete($ticket);
        return redirect()->route('admin.ticket.tickets.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
