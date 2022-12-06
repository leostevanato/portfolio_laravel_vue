<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    static $skills = [
        'PHP',
        'MySQL',
        'HTML',
        'CSS',
        'SASS',
        'JavaScript',
        'jQuery',
        'React',
        'Vue',
        'Wordpress',
        'Moodle',
        'Laravel'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$skills as $skill) {
            DB::table('skills')->insert([
                'title' => $skill,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
