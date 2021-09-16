<?php

namespace Database\Seeders;

use App\Models\TicketPriority;
use Illuminate\Database\Seeder;

class TicketPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TicketPriority = new TicketPriority();
        $TicketPriority->priority = "Bajo";
        $TicketPriority->save();

        $TicketPriority1 = new TicketPriority();
        $TicketPriority1->priority = "Intermedio";
        $TicketPriority1->save();

        $TicketPriority2 = new TicketPriority();
        $TicketPriority2->priority = "Alto";
        $TicketPriority2->save();

        $TicketPriority3 = new TicketPriority();
        $TicketPriority3->priority = "Urgente";
        $TicketPriority3->save();

        
    }
}
