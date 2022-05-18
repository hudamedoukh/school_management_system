<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            'عربي', 'علوم', 'حاسوب', 'انجليزي', 'رياضيات','كيمياء','أحياء', 'فيزياء'
            // ['en'=> 'Arabic', 'ar'=> 'عربي'],
            // ['en'=> 'Sciences', 'ar'=> 'علوم'],
            // ['en'=> 'Computer', 'ar'=> 'حاسوب'],
            // ['en'=> 'English', 'ar'=> 'انجليزي'],
            // ['en'=> 'Math', 'ar'=> 'رياضيات'],
            // ['en'=> 'Chemistry', 'ar'=> 'كيمياء'],
            // ['en'=> 'Biology', 'ar'=> 'أحياء'],
            // ['en'=> 'Physics', 'ar'=> 'فيزياء'],


        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
