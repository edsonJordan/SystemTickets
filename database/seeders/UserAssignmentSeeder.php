<?php

namespace Database\Seeders;

use App\Models\UserAssignment;
use Illuminate\Database\Seeder;

class UserAssignmentSeeder extends Seeder
{
    public function run()
    {
        UserAssignment::factory(100)->create();
    }
}
