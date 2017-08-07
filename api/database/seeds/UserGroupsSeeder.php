<?php

use App\UserGroups;
use Illuminate\Database\Seeder;

class UserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 4;
        $labels = ['ADMIN', 'USER', 'GUEST', 'SUPERADMIN', 'OTHER'];

        for ($i = 0; $i < $limit; $i++) {
            UserGroups::create([
                'name'=>$labels[$i],
                'code' => strtolower($labels[$i]),
                'description'=>$faker->text()
            ]);
        }
    }
}
