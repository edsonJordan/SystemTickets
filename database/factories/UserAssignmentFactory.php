<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAssignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'ticket_id' => Ticket::all()->random()->id
        ];
    }
}
