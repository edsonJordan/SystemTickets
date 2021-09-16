<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\GroupSupport;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id' => GroupSupport::all()->random()->id,
            'ticket_id' => Ticket::all()->random()->id
        ];
    }
}
