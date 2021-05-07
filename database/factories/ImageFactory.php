<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * State dari gambarnya, 
     * pilih satu [news, packages, destinations]
     */
    public function news()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'news',
                'path' => 'news' . '/' . $this->faker->image(storage_path('app/public/news'), 2000, 1500, null, false),
            ];
        });
    }
    public function packages()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'packages',
                'path' => 'packages' . '/' . $this->faker->image(storage_path('app/public/packages'), 2000, 1500, null, false),
            ];
        });
    }
    public function destinations()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'destinations',
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
