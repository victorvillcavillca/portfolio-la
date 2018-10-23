<?php

use App\Thought;
use Illuminate\Database\Seeder;

class ThoughtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Thought::class,100)->create();
    }
}
