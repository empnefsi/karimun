<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Services\FactoryHelper;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->sentence());
        $helper = new FactoryHelper;
        
        return [
            'title' => $title,
            'slug' => Str::of($title)->slug('-'),
            'description' => $helper->createPara(10),
        ];
    }
}
