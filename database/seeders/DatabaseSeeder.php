<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Service::truncate();
        // User::truncate();
        // Review::truncate();


        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        

        $service1 = Service::factory()->create();
        $service2 = Service::factory()->create();


        Review::factory(2)->create([
            'user_id'=>$user1->id,
            'service_id'=>$service1->id,
        ]);

        Review::factory(1)->create([
            'user_id'=>$user2->id,
            'service_id'=>$service2->id,
        ]);


      
    }
}
