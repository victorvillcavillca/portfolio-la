<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	#1
    	Tag::create([
        	'name' => 'Ministerio Joven',
        	'slug' => str_slug('Ministerio Joven')
        ]);
		#2
        Tag::create([
        	'name' => 'Jóvenes',
        	'slug' => str_slug('Jóvenes')
        ]);
		#3
        Tag::create([
        	'name' => 'Conquistadores',
        	'slug' => str_slug('Conquistadores')
        ]);
		#4
        Tag::create([
        	'name' => 'Aventureros',
        	'slug' => str_slug('Aventureros')
        ]);
        #5
        Tag::create([
        	'name' => 'IASD',
        	'slug' => str_slug('IASD')
        ]);

        factory(App\Tag::class, 20)->create();
    }
}
