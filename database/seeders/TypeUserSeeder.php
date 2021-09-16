<?php

namespace Database\Seeders;

use App\Models\TypeUser;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeUser = new TypeUser();
        $typeUser->type_user = "Funcionario Público";
        $typeUser->save();

        $typeUser1 = new TypeUser();
        $typeUser1->type_user = "Empleado de Confianza";
        $typeUser1->save();

        $typeUser2 = new TypeUser();
        $typeUser2->type_user = "Servidor Público";
        $typeUser2->save();
    }
}
