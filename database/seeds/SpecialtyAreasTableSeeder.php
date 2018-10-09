<?php

use Illuminate\Database\Seeder;

class SpecialtyAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SpecialtyArea::class, 20)->create();
    }
}
