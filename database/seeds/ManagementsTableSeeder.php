<?php

use App\Management;
use Illuminate\Database\Seeder;

class ManagementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Management::class,50)->create();
    }
}
