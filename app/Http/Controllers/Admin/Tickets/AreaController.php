<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreAreaRequest;
use App\Http\Requests\Admin\Ticket\UpdateAreaRequest;
use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller{

    public function __construct(){
        $this->middleware('can:admin.ticket.areas.index')->only('index');        
        $this->middleware('can:admin.ticket.areas.create')->only('create', 'store');        
        $this->middleware('can:admin.ticket.areas.edit')->only('edit', 'update');        
        $this->middleware('can:admin.ticket.areas.destroy')->only('destroy');        
    }

    public function index()
    {
        return view('admin.ticket.areas.index');
    }

    public function create()
    {  
        
        return view('admin.ticket.areas.create');
    }
    
    public function store(StoreAreaRequest $request)
    {
        $request->validate(['area' => 'required']);
        $role = Area::create($request->all());
        return redirect()->route('admin.ticket.areas.index')->with('info', 'El área se creo correctamente');
    }
    public function show(Area $area)
    {
        //
    }
    public function edit(Area $area)
    {
        return view('admin.ticket.areas.edit', compact('area'));
    }

    public function update(UpdateAreaRequest $request, Area $area)
    {
        $area->update($request->all());
        return redirect()->route('admin.ticket.areas.index', $area)->with('info', 'El área se edito correctamente');
    }

    public function destroy(Area $area)
    {
        $area->delete($area);
        return redirect()->route('admin.ticket.areas.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
