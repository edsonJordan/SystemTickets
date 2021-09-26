<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\TypeTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'typeticket_id' => TypeTicket::all()->random()->id,
            'priority_id' => TicketPriority::all()->random()->id,
            'status_id' => TicketStatus::all()->random()->id,
            'tittle' => $this->faker->text(200),
            'description' => $this->faker->text(500)
        ];
    }
}
