<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Services\FactoryHelper;

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
        $name = ucwords($this->faker->sentence(2));
        $helper = new FactoryHelper;

        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'description' => $helper->createPara(10),
            'price' => $this->faker->randomDigitNotNull() . "000000",
        ];
    }
}
