<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
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
            'subtitle' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'contenu' => $this->faker->paragraph,
            'photo' => $this->faker->imageUrl(60,60),
            'cat_id' => $this->faker->randomElement(Categorie::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id' => $this->faker->randomElement(Categorie::where('is_parent',0)->pluck('id')->toArray()),
            'conditions' => $this->faker->randomElement(['publier','is_featured']),
            'added_by' => 'admin',
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
