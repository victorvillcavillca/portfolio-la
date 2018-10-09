<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Resource::class, 300)->create()->each(function(App\Resource $resource) {
        	$resource->tags()->attach([
        		rand(1,5), 
        		rand(6,14), 
        		rand(15,20)
        	]);
        });
    }
}
