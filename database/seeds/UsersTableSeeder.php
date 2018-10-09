<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\User::class, 29)->create();

        App\User::create([
        	'name' => 'Victor Villca Villca',
        	'email'=> 'victor.villca.v@gmail.com',
        	'password' => bcrypt('123456')
        ]);
    }
}
