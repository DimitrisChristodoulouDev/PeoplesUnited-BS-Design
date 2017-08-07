<?php

use App\UserInGroups;
use Illuminate\Database\Seeder;

class UserInGroupsSeeder extends Seeder
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

        for ($i = 0; $i < $limit; $i++) {
            UserInGroups::create([
                'userID'=>random_int(0, 20),
                'groupID'=> random_int(0, 4),
            ]);
        }
    }
}
