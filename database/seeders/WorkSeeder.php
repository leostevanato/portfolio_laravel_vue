<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works_count = 0;

        foreach (Portfolio::all() as $portfolio) {
            foreach (range(1, rand(3, 10)) as $index) {
                $skills = DB::table('skills')->inRandomOrder()->limit(rand(1, DB::table('skills')->count()))->pluck('id');

                $works_count++;
                $title = Str::ucfirst(fake()->words(3, true));

                $work = Work::create([
                    'id' => $works_count,
                    'portfolio_id' => $portfolio->id,
                    'title' => $title,
                    'slug' => Str::slug($title, '-'),
                    'description' => fake()->text(),
                    'url' => fake()->url(),
                    'visible' => 1
                ]);
                
                $work->skills()->attach($skills);
                $work->save();
            }
        }
    }
}
