<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use database\seeds\UsersSeeder;
// use database\seeds\ReportDestinationsSeeder;
// use database\seeds\EventTypesSeeder;
// use database\seeds\DalilEntitiesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(ReportDestinationsSeeder::class);
        $this->call(EventTypesSeeder::class);
        $this->call(DalilEntitiesSeeder::class);

    }
}
