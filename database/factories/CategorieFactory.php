<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->sentences(3,true),
            'photo' => $this->faker->imageUrl(60,60),
            'status' => $this->faker->randomElement(['active','inactive']),
            'is_parent' => $this->faker->randomElement([true,false]),
            'parent_id' => $this->faker->randomElement(Categorie::pluck('id')->toArray()),
        ];
    }
}
