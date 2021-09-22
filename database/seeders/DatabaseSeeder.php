<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\GroupSupport;
use App\Models\Ticket;
use App\Models\TypeSupport;
use App\Models\TypeUser;
use App\Models\User;
use Database\Factories\TicketFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //TypeUser::factory(1)->create();

        $this->call(TypeSupportSeeder::class);
        $this->call(GroupSupportSeeder::class);

        $this->call(TypeUserSeeder::class);
        $this->call(AreaSeeder::class);

        User::factory(100)->create();
            User::create([
                'name' => 'Edson Jordan Huamani Ñahuin',
                'type_id' => TypeUser::all()->random()->id,
                'area_id' => Area::all()->random()->id,
                'group_id' => GroupSupport::all()->random()->id,
                'email' => 'edson_4555@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('asd123'),
                'remember_token' => Str::random(10),
            ]);
       
        
        $this->call(TypeTicketSeeder::class);
        $this->call(TicketPrioritySeeder::class);
        $this->call(TicketStatusSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(AssignmentSeeder::class);
        $this->call(UserAssignmentSeeder::class);

        /* \App\Models\Ticket::factory(100)->create(); */
        
    }
}
