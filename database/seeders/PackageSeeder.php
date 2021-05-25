<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Package;
use App\Models\Image;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directory = 'public/packages';
        Storage::deleteDirectory($directory);
        Storage::makeDirectory($directory);

        Package::factory(5)
            ->has(Image::factory(1))
            ->create();
    }
}
