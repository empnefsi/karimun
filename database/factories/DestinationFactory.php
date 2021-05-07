<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DestinationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Destination::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->street();

        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'description' => $this->faker->text(),
            'coordinate' => $this->faker->latitude() . " " . $this->faker->longitude(),
        ];
    }
}
