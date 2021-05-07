<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([DestinationSeeder::class]);
        $this->call([PackageSeeder::class]);
        $this->call([NewsSeeder::class]);
        $this->call([UsersTableSeeder::class]);
    }
}
