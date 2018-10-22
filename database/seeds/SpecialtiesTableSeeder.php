<?php

use App\Specialty;
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
    	Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 5,
	        'name' 			=> 'Código Semáforo',
	        'description'   => 'AP 046 - Especialidad de Código Semáforo, perteneciente al Área de Actividades Profesionales.',
	        'order' 		=> 1,
	        'slug' 			=> str_slug('Código Semáforo'),
	        'file'          => '/image/upload/specialties/codigo-semaforo.jpg',
	        'filename' 		=> '/doc/upload/specialties/AP-046-Codigo-Semaforo.pdf',
	        'imagename' 	=> '/image/upload/specialties/codigo-semaforo.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Perros',
	        'description' 	=> 'EN 034 - Especialidad de Perros, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Perros'),
	        'file'          => '/image/upload/specialties/perros.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN-034-perros.pdf',
	        'imagename' 	=> '/image/upload/specialties/perros.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #3
        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Campamento I',
	        'description' 	=> 'AR 050 - Especialidad de Campamento I, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Campamento I'),
	        'file'          => '/image/upload/specialties/campamento_I.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 050 - Campamento I.pdf',
	        'imagename' 	=> '/image/upload/specialties/campamento_I.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #4
        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Campamento II',
	        'description' 	=> 'AR 051 - Especialidad de Campamento II, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Campamento II'),
	        'file'          => '/image/upload/specialties/campamento_II.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 051 - Campamento II.pdf',
	        'imagename' 	=> '/image/upload/specialties/campamento_II.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #5
        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Campamento III',
	        'description' 	=> 'AR 052 - Especialidad de Campamento III, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Campamento III'),
	        'file'          => '/image/upload/specialties/campamento_III.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 052 - Campamento III.pdf',
	        'imagename' 	=> '/image/upload/specialties/campamento_III.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #6
        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Escatología',
	        'description' 	=> 'AM 038 - Especialidad de Escatología, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Escatología'),
	        'file'          => '/image/upload/specialties/escatologia.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM-038-Escatologia.pdf',
	        'imagename' 	=> '/image/upload/specialties/escatologia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #7
        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Cometas',
	        'description' 	=> 'AR 059 - Especialidad de Cometas, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Cometas'),
	        'file'          => '/image/upload/specialties/cometas.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR-059-Cometas.pdf',
	        'imagename' 	=> '/image/upload/specialties/cometas.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #8
        Specialty::create([
        	'user_id' 		=> 1,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Nudos y amarras',
	        'description' 	=> 'AR 040 - Especialidad de Nudos y amarras, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 2,
	        'slug' 			=> str_slug('Nudos y amarras'),
	        'file'          => '/image/upload/specialties/nudos_y_amarras.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR-040-Nudos-y-amarras.pdf',
	        'imagename' 	=> '/image/upload/specialties/nudos_y_amarras.jpg',
	        'status'        => 'PUBLISHED'
        ]);

		factory(Specialty::class, 5)->create();
    }
}
