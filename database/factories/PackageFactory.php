<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigitNotNull() . "000000",
        ];
    }
}
