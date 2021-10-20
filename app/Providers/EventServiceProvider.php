<?php

namespace App\Providers;

use App\Models\Assignment;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event){
            $countTicket = Ticket::where('status_id', 1)->count();
            $countAssignment = Assignment::all()->count();
            $countUserAssignment = UserAssignment::all()->count();
            $event->menu->add(
                ['header' => 'SOPORTE', 'can' => 'admin.ticket.tickets.index']
                ,
                ['text' => 'Tickets', 
                'route' => 'admin.ticket.tickets.index', 
                'can' => 'admin.ticket.tickets.index', 
                'icon'=> 'far fa-fw fa-file',                
                'label' =>  $countTicket,
                'label_color' =>'warning'], 

                ['text' => 'Tickets a equipos', 
                'route' => 'admin.ticket.assignments.index',
                'can' => 'admin.ticket.assignments.index',
                'icon'=> 'fas fa-fw fa-users',                                  
                'label' =>  $countAssignment,
                'label_color' =>'primary'],
            
                ['text' => 'Tickets a colaborador', 
                'route' => 'admin.ticket.userassignments.index',
                'can' => 'admin.ticket.userassignments.index',
                'icon'=> 'fas fa-fw fa-user-cog',                 
                'label' =>  $countUserAssignment,
                'label_color' =>'primary'],

                ['text' => 'Tickets de mi equipo', 
                'route' => 'admin.ticket.tickets.mygroup',
                'can' => 'admin.ticket.tickets.mygroup',
                'icon'=> 'far fa-fw fa-building'],

                ['text' => 'Mis Tickets', 
                'route' => 'admin.ticket.tickets.myticket',
                'can' => 'admin.ticket.tickets.myticket',
                'icon'=> 'far fa-fw fa-building']

            );
        });
    }
}
