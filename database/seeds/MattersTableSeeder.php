<?php

use App\Matter;
use Illuminate\Database\Seeder;

class MattersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Matter::class, 100)->create();
    }
}
