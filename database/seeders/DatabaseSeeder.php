<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Wisnu',
            'email' => 'wisnukm41@gmail.com',
            'password' => '$2y$10$9gy5Pt60V89tIziD5Ok/Z.eoS3GELoVduKg.hbJFxgZBhLK30giuy',
        ]);
    }
}
