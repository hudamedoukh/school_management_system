<?php
namespace Database\Seeders;

use App\Models\My_Parent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
            $my_parents = new My_Parent();
            $my_parents->email = 'samir.gamal77@yahoo.com';
            $my_parents->password = Hash::make('12345678');
            $my_parents->Name_Father = 'سمير جمال';
            $my_parents->National_ID_Father = '1234567810';
            $my_parents->Phone_Father = '1234567810';
            $my_parents->Job_Father ='مبرمج';

            $my_parents->Address_Father ='غزة';
            $my_parents->Name_Mother = 'سما';
            $my_parents->National_ID_Mother = '1234567810';
            $my_parents->Phone_Mother = '1234567810';
            $my_parents->Job_Mother = 'معلمة';
            $my_parents->Address_Mother ='غزة';
            $my_parents->save();

    }
}
