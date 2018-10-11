<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

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

        App\User::create([
            'name'      => 'Joel Villca',
            'email'     => 'joel.villca@gmail.com',
            'password'  => bcrypt('123456'),
        ]);

        Role::create([
            'name'      => 'Admin',
            'slug'      => 'slug',
            'special'   => 'all-access'
        ]);
    }
}
