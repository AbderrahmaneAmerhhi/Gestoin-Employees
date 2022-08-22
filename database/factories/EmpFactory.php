<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\emp>
 */
class EmpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->name(),
            'dept_id'=>$this->faker->numberBetween(1,10),
            'image'=> $this->faker->imageUrl(),
            'registration'=>$this->faker->unique()->numberBetween(1,200),
            'sup_id'=>$this->faker->numberBetween(1,200),
            'date_emb'=>$this->faker->dateTime(),
            'status'=>$this->faker->numberBetween(0,1),
            'post'=>$this->faker->randomElement(['technicien','ingenieur','technicien specialise','vendeur']),
        ];
    }
}
