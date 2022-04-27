<?php

namespace Database\Factories;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        /** @var Author $author */
        $author = app(AuthorRepository::class)->getRandom();

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text(),
            'release_date' => $this->faker->dateTime,
            'author_id' => $author->id,
        ];
    }
}
