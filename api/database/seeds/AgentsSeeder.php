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

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            Agent::create([
                'contactID'=>random_int(1, 3),
                'passportFileUrl' => $faker->firstName,
                'passportNumber'=> $faker->date('Y-m-d'),
                'socialMediaLinks'=> $faker->email,

            ]);
        }
    }
}
