<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Services\FactoryHelper;

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
        $name = ucwords($this->faker->street());
        $helper = new FactoryHelper;

        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'description' => $helper->createPara(10),
            'coordinate' => $this->faker->latitude() . " " . $this->faker->longitude(),
        ];
    }
}
