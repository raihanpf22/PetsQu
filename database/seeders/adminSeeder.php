<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        
        DB::table('admin')->insert([
            'admin_name'=> 'AdminProgrammer2',
            'email'=> 'swieta@student.gunadarma.ac.id',
            'telp' => '082260307011',
            'password'=> Hash::make('123'),
            'created_at' =>$faker-> dateTime($max = 'now', $timezone = null),
            'updated_at'=>$faker->dateTime($max = 'now', $timezone = null)
        ]);
        
    }
}
