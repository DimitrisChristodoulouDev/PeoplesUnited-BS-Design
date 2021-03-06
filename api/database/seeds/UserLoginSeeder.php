<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\UserLogin;
class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $limit = 20;
        UserLogin::create([ //,

            'name' => 'Dimitris',
            'fullName' => 'Dimitris Christodoulou',
            'email'=> 'grivas1911@gmail.com',
            'password' => '12345',
        ]);
        for ($i = 0; $i < $limit; $i++) {
            UserLogin::create([ //,

                    'name' => $faker->firstName,
                    'fullName' => $faker->name,
                    'email'=> $faker->email,
                    'password' => bcrypt($faker->password(6, 20)),
                    'token' => bcrypt($faker->password(6, 20)),
            ]);
        }
    }
}
