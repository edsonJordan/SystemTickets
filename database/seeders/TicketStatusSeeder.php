<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new TicketStatus();
        $status->status = "Pendiente";
        $status->save();

        $status1 = new TicketStatus();
        $status1->status = "Resuelto";
        $status1->save();

        $status2 = new TicketStatus();
        $status2->status = "Asignado";
        $status2->save();
    }
}
