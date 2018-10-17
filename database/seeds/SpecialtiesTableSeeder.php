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
	        'description'   => 'Especialidad de Código Semáforo (AP046-CÓDIGO SEMÁFORO) perteneciente al Área de Actividades Profesionales.',
	        'order' 		=> 1,
	        'slug' 			=> str_slug('Código Semáforo'),
	        'file'          => '/image/upload/specialties/codigo-semaforo.jpg',
	        'filename' 		=> '/doc/upload/specialties/AP-046-Codigo-Semaforo.pdf',
	        'imagename' 	=> '/image/upload/specialties/codigo-semaforo.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        App\Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 7,
	        'name' 			=> 'Perros',
	        'description' 	=> 'Especialidad de Perros (EN034–PERROS) perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Perros'),
	        'file'          => '/image/upload/specialties/perros.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN-034-perros.pdf',
	        'imagename' 	=> '/image/upload/specialties/perros.jpg',
	        'status'        => 'PUBLISHED'
        ]);

		factory(App\Specialty::class, 200)->create();
    }
}
