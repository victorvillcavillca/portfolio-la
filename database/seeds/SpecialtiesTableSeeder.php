<?php

use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Código Semáforo',
	        'order' 		=> 1,
	        'slug' 			=> str_slug('Código Semáforo'),
	        'file'          => 'codigo-semaforo.jpg',
	        'filename' 		=> 'AP-046-Codigo-Semaforo.pdf',
	        'imagename' 	=> 'codigo-semaforo.png',
	        'status'        => 'PUBLISHED'
        ]);

        App\Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 7,
	        'name' 			=> 'Perros',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Perros'),
	        'file'          => 'perros.jpg',
	        'filename' 		=> 'EN-034-perros.pdf',
	        'imagename' 	=> 'perros.png',
	        'status'        => 'PUBLISHED'
        ]);

		factory(App\Specialty::class, 200)->create();
    }
}
