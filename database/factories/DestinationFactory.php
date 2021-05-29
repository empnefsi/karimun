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
            'coordinate' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31754.06526262855!2d110.44149036800816!3d-5.819169630133396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e73ce4502749065%3A0x810dc44dc5d89f67!2sKarimun%20Jawa!5e0!3m2!1sen!2sid!4v1621967616871!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
        ];
    }
}
