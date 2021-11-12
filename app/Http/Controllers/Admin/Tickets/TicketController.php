<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use App\Models\Assignment;
use App\Models\Ticket;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\TypeTicket;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Http\Request;

class TicketController extends Controller{
    public function __construct(){
        $this->middleware('can:admin.ticket.tickets.index')->only('index');
        $this->middleware('FilterShowTicket')->only('show');
        $this->middleware('can:admin.ticket.tickets.create')->only('create', 'store');
        $this->middleware('can:admin.ticket.tickets.edit')->only('edit', 'update');
        $this->middleware('can:admin.ticket.tickets.destroy')->only('destroy');

        $this->middleware('can:admin.ticket.tickets.myticket')->only('myticket');
        $this->middleware('can:admin.ticket.tickets.mygroup')->only('mygroup');
    }


    public function index()
    {
        $tickets = Ticket::all();       
        return view('admin.ticket.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        $typesticket = TypeTicket::pluck('type', 'id');
        $prioritys = TicketPriority::pluck('priority', 'id');
        $status = TicketStatus::pluck('status', 'id');
        return view('admin.ticket.tickets.create', compact('users', 'typesticket', 'prioritys', 'status'));
    }

    public function store(StoreTicketRequest $request)
    {
        Ticket::create($request->all());        
       return redirect()->route('admin.ticket.tickets.index')->with('info', 'El área se creo correctamente');
    }

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
    public function update(StoreTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->route('admin.ticket.tickets.index')->with('info', 'El ticket se edito correctamente');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete($ticket);
        return redirect()->route('admin.ticket.tickets.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
    public function mygroup()
    {
        $group =  User::select('group_id')->where('id', auth()->id())->get();
        $tickets = Assignment::where('group_id', $group[0]->group_id)->get();
        return view('admin.ticket.tickets.mygroup', compact('tickets', 'group'));
    }
    public function editmygroup(Assignment $assignment)
    {
        Ticket::where('id', $assignment->ticket_id)->update(['status_id' => 2]);
        return redirect()->route('admin.ticket.tickets.mygroup')->with('info', 'El ticket se dio de alta correctamente');
    }
    public function myticket()
    {
        $tickets = UserAssignment::where('user_id', auth()->id() )->get();
        return view('admin.ticket.tickets.myticket', compact('tickets'));
    }
    public function editmyticket(UserAssignment $userassignment)
    {
       
        Ticket::where('id', $userassignment->ticket_id)->update(['status_id' => 2]);
        return redirect()->route('admin.ticket.tickets.myticket')->with('info', 'El ticket se dio de alta correctamente');
    }
    

}
