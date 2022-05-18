<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();

        $genders = [
            'ذكر', 'أنثى'      
        ];
        foreach ($genders as $ge) {
            Gender::create(['Name' => $ge]);
        }
    }
}
