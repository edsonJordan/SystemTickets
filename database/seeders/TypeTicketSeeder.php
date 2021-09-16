<?php

namespace Database\Seeders;

use App\Models\TypeTicket;
use Illuminate\Database\Seeder;

class TypeTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeTicket = new TypeTicket();
        $typeTicket->type = "Llamada";
        $typeTicket->save();

        $typeTicket1 = new TypeTicket();
        $typeTicket1->type = "Web";
        $typeTicket1->save();

        $typeTicket2 = new TypeTicket();
        $typeTicket2->type = "Correo";
        $typeTicket2->save();
    }
}
