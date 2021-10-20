<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreGroupSupportRequest;
use App\Http\Requests\Admin\Ticket\UpdateGroupSupportRequest;
use App\Models\GroupSupport;
use App\Models\TypeSupport;
use Illuminate\Http\Request;

class GroupSupportController extends Controller{
    public function __construct(){
        $this->middleware('can:admin.ticket.groups.index')->only('index');
        $this->middleware('can:admin.ticket.groups.create')->only('create', 'store');
        $this->middleware('can:admin.ticket.groups.edit')->only('edit', 'update');
        $this->middleware('can:admin.ticket.groups.destroy')->only('destroy');
    }

    public function index()
    {   
        $groups= GroupSupport::all();
        return view('admin.ticket.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= TypeSupport::all();
        return view('admin.ticket.groups.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupSupportRequest $request)
    {
         GroupSupport::create($request->all());
        return redirect()->route('admin.ticket.groups.index')->with('info', 'El grupo se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupSupport  $groupSupport
     * @return \Illuminate\Http\Response
     */
    public function show(GroupSupport $groupSupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupSupport  $groupSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupSupport $group)
    {
        $types= TypeSupport::all();
        return view('admin.ticket.groups.edit', compact('group', 'types'));
    }

    public function update(UpdateGroupSupportRequest $request, GroupSupport $group)
    {
        $group->update($request->all());
        
        return redirect()->route('admin.ticket.groups.index')->with('info', 'El grupo se edito correctamente');
    }

    public function destroy(GroupSupport $group)
    {
        $group->delete($group);
        return redirect()->route('admin.ticket.groups.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
