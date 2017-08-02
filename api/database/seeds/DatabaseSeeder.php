<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AgentsSeeder::class);
         $this->call(ClubsSeeder::class);
         $this->call(ContactsCategoriesSeeder::class);
         $this->call(UserLoginSeeder::class);
         $this->call(ContactsSeeder::class);
    }
}
