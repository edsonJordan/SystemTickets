<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\GroupSupport;
use App\Models\Team;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* 'type_id' => TypeUser::all()->random()->id, */
        return [
            'name' => $this->faker->name(),            
            'type_id' => TypeUser::all()->random()->id,
            'area_id' => Area::all()->random()->id,
            'group_id' => GroupSupport::all()->random()->id,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }
        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
