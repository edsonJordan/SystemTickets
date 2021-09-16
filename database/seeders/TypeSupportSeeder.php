<?php

namespace Database\Seeders;

use App\Models\TypeSupport;
use Illuminate\Database\Seeder;

class TypeSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TypeSupport = new TypeSupport();
        $TypeSupport->type = "Soporte";
        $TypeSupport->save();

        $TypeSupport1 = new TypeSupport();
        $TypeSupport1->type = "Consulta";
        $TypeSupport1->save();

        $TypeSupport2 = new TypeSupport();
        $TypeSupport2->type = "Mantenimiento";
        $TypeSupport2->save();
    }
}
