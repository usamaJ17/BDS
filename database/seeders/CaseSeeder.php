<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Allcase;

class CaseSeeder extends Seeder
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
            $case=new Allcase();
            $case->patient_name = $faker->name;
            $case->patient_blood = "B+";
            $case->location = $faker->address;
            $case->age = $faker->randomNumber();
            $case->attendent_name =$faker->name;
            $case->attendent_contact = $faker->phoneNumber;
            $case->	attendent_blood = "A-";
            $nmbr=rand(1,2);
            if($nmbr==1){
                $case->	arranged_by = null;
                $case->donner_id = null;
            }
            else{
                $case->	arranged_by = "BDS";
                $case->donner_id = rand(16,35);
            }
            $case->save();
        }
    }
}
