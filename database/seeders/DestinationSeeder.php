<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Destination;
use App\Models\Image;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directory = 'public/destinations';
        Storage::deleteDirectory($directory);
        Storage::makeDirectory($directory);

        Destination::factory(5)
            ->has(Image::factory(1))
            ->create();
    }
}
