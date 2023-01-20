<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders_array = [
            SkillSeeder::class,
            SettingSeeder::class
        ];

        if (App::environment('local')) {
            $seeders_array[] = UserSeeder::class;
            $seeders_array[] = PortfolioSeeder::class;
            $seeders_array[] = WorkSeeder::class;
        }

        $this->call($seeders_array);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
