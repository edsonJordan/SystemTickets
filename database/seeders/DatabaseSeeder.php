<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Database\Factories\TicketFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /* 
        Funcionario Público
        Empleado de Confianza
        Servidor Público
        */
        //TypeUser::factory(1)->create();
         
        
        $this->call(TypeUserSeeder::class);
        $this->call(AreaSeeder::class);

        \App\Models\User::factory(100)->create();

        $this->call(TypeTicketSeeder::class);
        $this->call(TicketPrioritySeeder::class);
        $this->call(TicketStatusSeeder::class);


        $this->call(TicketSeeder::class);

        /* \App\Models\Ticket::factory(100)->create(); */
        
    }
}
