<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();
        $grades = [
            'المرحلة الابتدائية',
            'المرحلة الاعدادية',
            'المرحلة الثانوية',
        ];

        foreach ($grades as $grade) {
            Grade::create(['Name' => $grade]);
        }
    }
}
