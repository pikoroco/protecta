<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Publication;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'title' => $this->faker->text(5),
            'author_id' => random_int(1, Author::all()->count()),
        ];
    }
}
