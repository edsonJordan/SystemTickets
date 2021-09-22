<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreAreaRequest;
use App\Http\Requests\Admin\Ticket\UpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ticket.areas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete($area);
        return redirect()->route('admin.ticket.areas.index')->with('info', 'Los datos se eliminaron satisfactoriamente');
    }
}
