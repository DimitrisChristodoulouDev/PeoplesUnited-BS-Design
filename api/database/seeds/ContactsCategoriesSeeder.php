<?php

use App\ContactsCategories;
use Illuminate\Database\Seeder;

class ContactsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $tableName = ['agents', 'boardofdirector', 'clubstuff'];

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            ContactsCategories::create([
                'categoryLabel'=> ucfirst(array_random($tableName)),
                'tableNameReference' => array_random($tableName),

                          ]);
        }
    }
}
