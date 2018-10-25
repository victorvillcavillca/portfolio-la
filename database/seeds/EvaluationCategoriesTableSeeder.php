<?php

use App\EvaluationCategory;
use Illuminate\Database\Seeder;

class EvaluationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EvaluationCategory::class, 100)->create();
    }
}
