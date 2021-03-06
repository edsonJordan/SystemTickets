<?php

namespace App\Http\Controllers\Admin\tickets;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\GroupSupport;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class AssignmentController extends Controller{

    public function __construct(){
        $this->middleware('can:admin.ticket.assignments.index')->only('index');        
        $this->middleware('can:admin.ticket.assignments.create')->only('create', 'store');        
        $this->middleware('can:admin.ticket.assignments.edit')->only('edit', 'update');        
        $this->middleware('can:admin.ticket.assignments.destroy')->only('destroy');        
    }
    
    public function index(){
        $assignments = Assignment::all();
        return view('admin.ticket.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $groups = GroupSupport::pluck('group', 'id');
        $tickets = Ticket::all('user_id', 'tittle', 'id');
        return view('admin.ticket.assignments.create', compact('groups', 'tickets'));
    }

    public function store(Request $request)
    {
        //$post->technologies()->attach($request->group_id);

        foreach ($request->ticket_id as $ticket){
            Assignment::create([                
                'group_id'     => $request->group_id,
                'ticket_id'   => $ticket
            ]);
            DB::table('tickets')
            ->where('id', $ticket)
            ->update(['status_id' => 3]);
        }   
        return redirect()->route('admin.ticket.assignments.index')->with('info', 'El área se edito correctamente');
    }

    public function show(Assignment $assignment)
    {
        //
    }


    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    public function destroy(Assignment $assignment)
    {
        
        //return $assignment;
        $assignment->delete($assignment);
        return redirect()->route('admin.ticket.assignments.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
