<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Subject::factory();
        DB::table('subjects')->insert([
            ['subject_name' => 'język polski'],
            ['subject_name' => 'język angielski'],
            ['subject_name' => 'matematyka'],
            ['subject_name' => 'informatyka']
            ]);
    }
}
