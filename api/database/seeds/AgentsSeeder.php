<?php

use Illuminate\Database\Seeder;
use App\Agent;
class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            Agent::create([
                'contactID'=>$i,
                'passportFileUrl' => $faker->firstName,
                'passportNumber'=> $faker->date('Y-m-d'),
                'socialMediaLinks'=> $faker->email,

            ]);
        }
    }
}
