<?php

use App\VideoCategory;
use Illuminate\Database\Seeder;

class VideoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VideoCategory::class, 30)->create();
    }
}
