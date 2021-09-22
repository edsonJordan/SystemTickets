<?php

namespace Database\Seeders;

use App\Models\GroupSupport;
use App\Models\TypeSupport;
use Illuminate\Database\Seeder;

class GroupSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GroupSupport = new GroupSupport();
        $GroupSupport->group = "Hadware";
        $GroupSupport->type_id = TypeSupport::all()->random()->id;
        $GroupSupport->save();

        $GroupSupport1 = new GroupSupport();
        $GroupSupport1->group = "Software";
        $GroupSupport1->type_id = TypeSupport::all()->random()->id;
        $GroupSupport1->save();

        $GroupSupport2 = new GroupSupport();
        $GroupSupport2->group = "General";
        $GroupSupport2->type_id = TypeSupport::all()->random()->id;
        $GroupSupport2->save();
    }
}
