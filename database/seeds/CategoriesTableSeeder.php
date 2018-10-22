<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	#1
    	Category::create([
        	'name' => 'Iglesia Adventista del Séptimo Día',
        	'slug' => str_slug('Iglesia Adventista del Séptimo Día'),
        	'body' => 'Publicaciones e informaciones relacionadas a la Categoría de la Iglesia Adventista del Séptimo Día.'
        ]);
    	#2
    	Category::create([
        	'name' => 'Ministerio Joven',
        	'slug' => str_slug('Ministerio Joven'),
        	'body' => 'Publicaciones e informaciones relacionadas a la Categoría del Ministerio Joven.'
        ]);
    	#3
    	Category::create([
        	'name' => 'Jóvenes Adventistas',
        	'slug' => str_slug('Jóvenes Adventistas'),
        	'body' => 'Publicaciones e informaciones relacionadas a la Categoría de los Jóvenes Adventistas (JA).'
        ]);
		#4
		Category::create([
        	'name' => 'Club de Conquistadores',
        	'slug' => str_slug('Club de Conquistadores'),
        	'body' => 'Publicaciones e informaciones relacionadas a la Categoría Club de Conquistadores.'
        ]);
		#5
		Category::create([
        	'name' => 'Club de Aventureros',
        	'slug' => str_slug('Club de Aventureros'),
        	'body' => 'Publicaciones e informaciones relacionadas a la Categoría Club de Aventureros.'
        ]);

		factory(Category::class, 15)->create();
    }
}
