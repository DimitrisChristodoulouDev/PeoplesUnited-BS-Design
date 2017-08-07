<?php

use App\UserDetails;
use Illuminate\Database\Seeder;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 21;

        for ($i = 0; $i < $limit; $i++) {
            UserDetails::create([
                'name'=>$faker->name,
                'surname' => $faker->lastName ,
                'country'=>$faker->countryCode,
                'userLoginID'=>random_int(0, $limit)
            ]);
        }
    }
}
