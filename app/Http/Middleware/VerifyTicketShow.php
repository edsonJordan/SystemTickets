<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserAssignment;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class VerifyTicketShow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)    {
        //return $next($request);
        $ticket  = $request->route()->parameter('ticket');


        $existTicket = UserAssignment::where('user_id', auth()->user()->id)->where('ticket_id', $ticket->id)->first();
        
        //$role = User::find(auth()->user()->id)->roles->first()->name;
        
        //$role = User::find(auth()->user()->id)->roles->first()->name;
        /* if($role !== 'ADMIN ' or  !empty($existTicket)){
            return $next($request);           
        }else{
            return abort(403, ' is not authorized to view this ticket.');
        } */
        if(User::find(auth()->user()->id)->roles->first()){
            $role =  User::find(auth()->user()->id)->roles->first()->name;            
          
            if($role == "Admin" or $role == "Admin_group" or !empty($existTicket)){
                //return $next($request);
                return $next($request);
                //return abort(403, "es administrador".' is not authorized to view this ticket.');
            }
        }
        return abort(403, ' is not authorized to view this ticket.');
      
    }
 
}
