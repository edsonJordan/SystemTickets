<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\GroupSupport;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

    
   
class HomeController extends Controller{
    public function __construct(){
        $this->middleware('can:admin.ticket.home.index');
    }
    public function index(){
        $countUsers = User::all()->count();
        $countGroup = GroupSupport::all()->count();
        $countAreas = Area::all()->count();
        $countTickets = Ticket::all()->count();
        //Status Ticket
        $TiPendLlam = Ticket::where('status_id', 1)->where('typeticket_id', 1)->count();
        $TiRestLlam= Ticket::where('status_id', 2)->where('typeticket_id', 1)->count();
        $TiAsigLlam= Ticket::where('status_id', 3)->where('typeticket_id', 1)->count();

        $TiPendWeb = Ticket::where('status_id', 1)->where('typeticket_id', 2)->count();
        $TiRestWeb= Ticket::where('status_id', 2)->where('typeticket_id', 2)->count();
        $TiAsigWeb= Ticket::where('status_id', 3)->where('typeticket_id', 2)->count();

        $TiPendCorr = Ticket::where('status_id', 1)->where('typeticket_id', 3)->count();
        $TiRestCorr= Ticket::where('status_id', 2)->where('typeticket_id', 3)->count();
        $TiAsigCorr= Ticket::where('status_id', 3)->where('typeticket_id', 3)->count();

        //Priority Ticket
        $TiBajLlam = Ticket::where('priority_id', 1)->where('typeticket_id', 1)->count();
        $TiInterLlam= Ticket::where('priority_id', 2)->where('typeticket_id', 1)->count();
        $TiAltoLlam= Ticket::where('priority_id', 3)->where('typeticket_id', 1)->count();
        $TiUrgenLlam= Ticket::where('priority_id', 4)->where('typeticket_id', 1)->count();

        $TiBajWeb = Ticket::where('priority_id', 1)->where('typeticket_id', 2)->count();
        $TiInterWeb= Ticket::where('priority_id', 2)->where('typeticket_id', 2)->count();
        $TiAltoWeb= Ticket::where('priority_id', 3)->where('typeticket_id', 2)->count();
        $TiUrgenWeb= Ticket::where('priority_id', 4)->where('typeticket_id', 2)->count();

        $TiBajCorr = Ticket::where('priority_id', 1)->where('typeticket_id', 3)->count();
        $TiInterCorr= Ticket::where('priority_id', 2)->where('typeticket_id', 3)->count();
        $TiAltoCorr= Ticket::where('priority_id', 3)->where('typeticket_id', 3)->count();
        $TiUrgenCorr= Ticket::where('priority_id', 4)->where('typeticket_id', 3)->count();


        $TickePendientes = Ticket::where('status_id', 1)->count();
        $TickeResueltos = Ticket::where('status_id', 2)->count();
        $TickeAsignados = Ticket::where('status_id', 3)->count();

        $ranking = DB::table('tickets')
        ->select('user_id', 'users.name', DB::raw('COUNT(user_id) AS conteo'))
        ->join('users', 'users.id', '=', 'tickets.user_id')
        ->orderBy('conteo','desc')
        ->groupBy('user_id')
        ->limit(6)
        ->get();

        $rankingUserAssingment = DB::table('user_assignments')
        ->select('users.name', DB::raw('COUNT(user_id) AS conteo'))
        ->join('users', 'users.id', '=', 'user_assignments.user_id')
        ->orderBy('conteo','desc')
        ->groupBy('user_id')
        ->limit(6)
        ->get();

        $rankingGroupAssingment = DB::table('assignments')
        ->select('group_supports.group', DB::raw('COUNT(group_id) AS conteo'))
        ->join('group_supports', 'group_supports.id', '=', 'assignments.group_id')
        ->orderBy('conteo','desc')
        ->groupBy('group_id')
        ->limit(6)
        ->get();

        return view('admin.ticket.home.index', 
        compact('countUsers', 'countGroup', 'countAreas', 'countTickets', 
        'TiPendLlam', 'TiRestLlam', 'TiAsigLlam', 'TiBajLlam', 'TiInterLlam', 'TiAltoLlam', 'TiUrgenLlam',
        'TiPendWeb', 'TiRestWeb', 'TiAsigWeb', 'TiBajWeb', 'TiInterWeb', 'TiAltoWeb', 'TiUrgenWeb', 
        'TiPendCorr', 'TiRestCorr', 'TiAsigCorr', 'TiBajCorr', 'TiInterCorr', 'TiAltoCorr', 'TiUrgenCorr', 
        'TickePendientes', 'TickeResueltos', 'TickeAsignados', 'ranking', 'rankingUserAssingment', 'rankingGroupAssingment'));
    }
}
    