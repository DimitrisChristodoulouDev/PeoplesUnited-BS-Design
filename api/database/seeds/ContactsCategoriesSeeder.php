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



        for ($i = 0; $i < count($tableName); $i++) {
            ContactsCategories::create([
                'categoryLabel'=> ucfirst(array_random($tableName)),
                'tableNameReference' => $tableName[$i],

                          ]);
        }
    }
}
