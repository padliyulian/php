<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i<2000; $i++) {
            DB::table('employees')->insert([
                'nik' => $faker->numerify('##########'),
                'name' => $faker->name,
                'sex' => $faker->randomElement($array = array ('Male', 'Female')),
                'position_id' => $faker->numberBetween($min = 1, $max = 6),
                'email' => $faker->email,
                'photo' => 'noimage.png',
                'created_at' => NOW()
           ]);
        }
    }
}
