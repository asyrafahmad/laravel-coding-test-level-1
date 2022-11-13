<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Event;
use database\factories\EventFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Event::factory()->times(50)->create();                // generate 50 records
    }
}
