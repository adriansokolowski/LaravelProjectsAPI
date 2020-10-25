<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\Factory;

class RewardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reward::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::inRandomOrder()->first()->id,
            'name' => $this->faker->text(20),
            'description' => $this->faker->text(500),
            'amount' => $this->faker->randomFloat(2, 0, 200)
        ];
    }
}
