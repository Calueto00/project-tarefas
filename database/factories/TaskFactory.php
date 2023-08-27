<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_done'=>$this->faker->boolean(),
            'title' => $this->faker->text(30),
             'description'=>$this->faker->text(60),
             'due_date'=>$this->faker->dateTime(),
            "user_id" =>User::all()->random(),
            'category_id'=>Category::all()->random()
        ];
    }
}
