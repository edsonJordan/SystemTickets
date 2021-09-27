<?php

namespace App\Providers;

use App\Models\Ticket;
use App\Models\User;
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
            $count = Ticket::where('status_id', 1)->count();
            $event->menu->add(
                ['header' => 'SOPORTE']
                ,[
                'text' => 'Tickets', 
                'route' => 'admin.ticket.tickets.index', 
                'icon'=> 'far fa-fw fa-file',
                
                'label' =>  $count,
                'label_color' =>'warning']);
        });
    }
}
