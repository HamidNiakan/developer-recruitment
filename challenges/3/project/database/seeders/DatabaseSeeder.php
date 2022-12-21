<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Driver;
use App\Models\Travel;
use App\Models\TravelEvent;
use App\Models\TravelSpot;
use Database\Factories\DriverFactory;
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
         \App\Models\User::factory()->create();
		 Driver::factory()->create();
		 Travel::factory()->create();
		 TravelEvent::factory()->create();
		 TravelSpot::factory()->create();
		 

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
