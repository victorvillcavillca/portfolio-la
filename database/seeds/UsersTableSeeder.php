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
            'password' => bcrypt('123456'),
            'photo' => '/image/profile.png',
        	'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        App\User::create([
            'name'      => 'Joel Villca',
            'email'     => 'joel.villca@gmail.com',
            'password'  => bcrypt('123456'),
            'photo' => '/image/profile.png',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        $role = Role::create([
            'name'      => 'Admin',
            'slug'      => 'slug',
            'special'   => 'all-access'
        ]);

        $role->permissions()->sync(NULL);
    }
}
