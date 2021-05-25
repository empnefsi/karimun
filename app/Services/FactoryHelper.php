<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\Factory;

class FactoryHelper extends Factory
{
    public function definition()
    {
        //DUMMY
    }

    public function createPara($paraCount)
    {
        $para = "";

        for ($i=1; $i < $paraCount; $i++) {
            switch ($i) {
                case 2:
                    $para = $para . "<h2>{$this->faker->sentence(3)}</h2><p>{$this->faker->paragraphs(3, true)}</p>";
                    break;

                case 3:
                    $para = $para . "<p><strong>{$this->faker->sentence(3)}</strong>{$this->faker->paragraphs(3, true)}<em>{$this->faker->sentence(3)}</em></p>";
                    break;
                
                case 4:
                    $para = $para . "<blockquote>{$this->faker->paragraphs(3, true)}</blockquote>";
                    break;

                case 5:
                    $para = $para . "<ol><li>{$this->faker->word()}</li><li>{$this->faker->word()}</li></ol><p>{$this->faker->paragraphs(3, true)}</p>";

                case 6:
                    $para = $para . "<ul><li>{$this->faker->word()}</li><li>{$this->faker->word()}</li></ul><p>{$this->faker->paragraphs(3, true)}</p>";

                default:
                    $para = $para . "<p>{$this->faker->paragraphs(3, true)}</p>";
                    break;
            }
        }
        return $para;
    }
}
