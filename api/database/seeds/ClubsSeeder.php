<?php

use Illuminate\Database\Seeder;
use App\Clubs;

class ClubsSeeder extends Seeder
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
            Clubs::create([
                'clubName' => $faker->name,
                'clubAgent' => random_int(0, 49),
                'country' => $faker->country,
                'city' => $faker->city,
                'stadium' => $faker->lastName,
                'address'=> $faker->streetAddress,
                'telephone'=> $faker->phoneNumber,
                'fax' => $faker->phoneNumber,
                'email' => $faker->email,
                'website'=>$faker->url,
                'socialMedia'=>$faker->url,
                'averageSalary'=>random_int(1000, 1000000),
                'bankAccount'=>$faker->bankAccountNumber,
                'vat'=>random_int(15,20),
                'notes'=>$faker->text(200)
            ]);
        }
    }
}
