<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new Area();
        $area->area = "TICS";
        $area->save();

        $area1 = new Area();
        $area1->area = "Procaduria";
        $area1->save();

        $area2 = new Area();
        $area2->area = "Contabilidad";
        $area2->save();
    }
}
