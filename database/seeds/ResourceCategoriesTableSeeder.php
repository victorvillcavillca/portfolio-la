<?php

use Illuminate\Database\Seeder;

class ResourceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\ResourceCategory::class, 20)->create();
    }
}
