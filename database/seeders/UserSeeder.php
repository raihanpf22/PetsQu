<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create(10); 
        
        for($i=1; $i<=10; $i++){
            DB::table('users')->insert([
                'name'=> $faker->name,
                'email'=> $faker->safeEmail,
                'address'=> $faker->address,
                 'postal_code'=>$faker->numberBetween($min = 1000, $max = 90000),
                 'telp'=>$faker->e164PhoneNumber,
                 'password' => Hash::make('123'),
                 'created_at' =>$faker-> dateTime($max = 'now', $timezone = null),
                 'updated_at'=>$faker->dateTime($max = 'now', $timezone = null)
                ]);
        };

        
    }
}
