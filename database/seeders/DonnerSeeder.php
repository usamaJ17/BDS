<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donner;
use Faker\Factory as Faker;

class DonnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i<50 ; $i++) { 
            $donner=new Donner;
            $donner->name = $faker->name;
            $donner->reg_num = $faker->name;
            $donner->email = $faker->email;
            $donner->phone = $faker->phoneNumber;
            $donner->group = "A+";
            $donner->location = $faker->address;
            $donner->history = $faker->randomNumber();
            $donner->date = $faker->date;
            $donner->team = $faker->name;
            $donner->save();
        }
    }
}
