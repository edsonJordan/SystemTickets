<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Bus\Dispatcher;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot(Dispatcher $events)
    {
        Schema::defaultStringLength(191);

       
    }
}
