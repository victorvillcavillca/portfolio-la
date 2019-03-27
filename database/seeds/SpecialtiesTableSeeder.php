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
    	#1
    	Specialty::create([
        	'user_id' 		=> 30,
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

		#2
        Specialty::create([
        	'user_id' 		=> 30,
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
        	'user_id' 		=> 30,
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
        	'user_id' 		=> 30,
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
        	'user_id' 		=> 30,
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
        	'user_id' 		=> 30,
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
        	'user_id' 		=> 30,
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
        	'user_id' 		=> 30,
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

        #9
        Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 3,
	        'name' 			=> 'Ganadería',
	        'description' 	=> 'AA 014 - Especialidad de Ganadería, perteneciente al Área de Actividades agrícolas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Ganadería'),
	        'file'          => '/image/upload/specialties/ganaderia.jpg',
	        'filename' 		=> '/doc/upload/specialties/AA 014 - Ganaderia.pdf',
	        'imagename' 	=> '/image/upload/specialties/ganaderia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #10
        Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Civismo cristiano',
	        'description' 	=> 'AM 006 - Especialidad de Civismo cristiano, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Civismo cristiano'),
	        'file'          => '/image/upload/specialties/civismo_cristiano.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 006 - Civismo Cristiano.pdf',
	        'imagename' 	=> '/image/upload/specialties/civismo_cristiano.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #11
        Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Testificación menores',
	        'description' 	=> 'AM 010 - Especialidad de Testificación menores, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Testificación menores'),
	        'file'          => '/image/upload/specialties/testificacion_menores.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 010 - Testificacion de Menores.pdf',
	        'imagename' 	=> '/image/upload/specialties/testificacion_menores.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #12
        Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Modales cristianos',
	        'description' 	=> 'AM 011 - Especialidad de Modales cristianos, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Modales cristianos'),
	        'file'          => '/image/upload/specialties/modales_cristianos.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 011 - Modales Cristianos.pdf',
	        'imagename' 	=> '/image/upload/specialties/modales_cristianos.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #13
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Vida familiar',
	        'description' 	=> 'AM 012 - Especialidad de Vida familiar, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Vida familiar'),
	        'file'          => '/image/upload/specialties/vida_familiar.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 012 - Vida familiar.pdf',
	        'imagename' 	=> '/image/upload/specialties/vida_familiar.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #14
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Temperancia',
	        'description' 	=> 'AM 013 - Especialidad de Temperancia, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Temperancia'),
	        'file'          => '/image/upload/specialties/temperancia.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 013 - Temperancia.pdf',
	        'imagename' 	=> '/image/upload/specialties/temperancia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #15
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Mayordomía',
	        'description' 	=> 'AM 015 - Especialidad de Mayordomía, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Mayordomía'),
	        'file'          => '/image/upload/specialties/mayordomia.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 015 - Mayordomia.pdf',
	        'imagename' 	=> '/image/upload/specialties/mayordomia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #16
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Aventurero para cristo',
	        'description' 	=> 'AM 016 - Especialidad de Aventurero para cristo, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Aventurero para cristo'),
	        'file'          => '/image/upload/specialties/aventurero_para_cristo.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 016 - Aventurero para Cristo.pdf',
	        'imagename' 	=> '/image/upload/specialties/aventurero_para_cristo.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #17
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Aventurero para cristo avanzado',
	        'description' 	=> 'AM 017 - Especialidad de Aventurero para cristo avanzado, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Aventurero para cristo avanzado'),
	        'file'          => '/image/upload/specialties/aventurero_para_cristo_avanzado.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 017 - Aventurero para Cristo - Avanzado.pdf',
	        'imagename' 	=> '/image/upload/specialties/aventurero_para_cristo_avanzado.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #18
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Marcado de Biblia',
	        'description' 	=> 'AM 019 - Especialidad de Marcado de Biblia, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Marcado de Biblia'),
	        'file'          => '/image/upload/specialties/marcado_biblia.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 019 - Marcado de Biblia.pdf',
	        'imagename' 	=> '/image/upload/specialties/marcado_biblia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #19
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Pacificador',
	        'description' 	=> 'AM 027 - Especialidad de Pacificador, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Pacificador'),
	        'file'          => '/image/upload/specialties/pacificador.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 027 - Pacificador.pdf',
	        'imagename' 	=> '/image/upload/specialties/pacificador.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #20
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 4,
	        'name' 			=> 'Patriotismo',
	        'description' 	=> 'AM 044 - Especialidad de Patriotismo, perteneciente al Área de Actividades misioneras y comunitarias.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Patriotismo'),
	        'file'          => '/image/upload/specialties/patriotismo.jpg',
	        'filename' 		=> '/doc/upload/specialties/AM 044 - Patriotismo.pdf',
	        'imagename' 	=> '/image/upload/specialties/patriotismo.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #21
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 5,
	        'name' 			=> 'Computación I-Básico',
	        'description' 	=> 'AP 041 - Especialidad de Computación I-Básico, perteneciente al Área de Actividades profesionales.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Computación I-Básico'),
	        'file'          => '/image/upload/specialties/computacion_I_basico.jpg',
	        'filename' 		=> '/doc/upload/specialties/AP 041 - Computacion - Basico.pdf',
	        'imagename' 	=> '/image/upload/specialties/computacion_I_basico.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #22
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Educación Física',
	        'description' 	=> 'AR 002 - Especialidad de Educación Física, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Educación Física'),
	        'file'          => '/image/upload/specialties/educacion_fisica.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 002 - Educacion Fisica.pdf',
	        'imagename' 	=> '/image/upload/specialties/educacion_fisica.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #23
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Natación principiante I',
	        'description' 	=> 'AR 003 - Especialidad de Natación principiante I, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Natación principiante I'),
	        'file'          => '/image/upload/specialties/natacion_principiante_I.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 003 - Natacion - Principiante I.pdf',
	        'imagename' 	=> '/image/upload/specialties/natacion_principiante_I.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #24
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Natación principiante II',
	        'description' 	=> 'AR 004 - Especialidad de Natación principiante II, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Natación principiante II'),
	        'file'          => '/image/upload/specialties/natacion_principiante_II.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 004 - Natacion Principiante II.pdf',
	        'imagename' 	=> '/image/upload/specialties/natacion_principiante_II.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #25
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Fogatas y cocina al aire libre',
	        'description' 	=> 'AR 020 - Especialidad de Fogatas y cocina al aire libre, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Fogatas y cocina al aire libre'),
	        'file'          => '/image/upload/specialties/fogotas_y_cocina_al_aire_libre.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 020 - Fogatas y cocina al aire libre.pdf',
	        'imagename' 	=> '/image/upload/specialties/fogotas_y_cocina_al_aire_libre.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #26
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Orientación',
	        'description' 	=> 'AR 021 - Especialidad de Orientación, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Orientación'),
	        'file'          => '/image/upload/specialties/orientacion.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 021 - Orientación.pdf',
	        'imagename' 	=> '/image/upload/specialties/orientacion.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #27
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Pionerismo',
	        'description' 	=> 'AR 022 - Especialidad de Pionerismo, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Pionerismo'),
	        'file'          => '/image/upload/specialties/pionerismo.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 022 - Pionerismo.pdf',
	        'imagename' 	=> '/image/upload/specialties/pionerismo.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #28
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Vida Silvestre',
	        'description' 	=> 'AR 024 - Especialidad de Vida Silvestre, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Vida Silvestre'),
	        'file'          => '/image/upload/specialties/vida_silvestre.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 024 - Vida Silvestre.pdf',
	        'imagename' 	=> '/image/upload/specialties/vida_silvestre.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #29
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Orden Cerrado',
	        'description' 	=> 'AR 047 - Especialidad de Orden Cerrado, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Orden Cerrado'),
	        'file'          => '/image/upload/specialties/orden_cerrado.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 047 - Orden Cerrado.pdf',
	        'imagename' 	=> '/image/upload/specialties/orden_cerrado.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #30
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Orden Cerrado Avanzado',
	        'description' 	=> 'AR 048 - Especialidad de Orden Cerrado Avanzado, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Orden Cerrado Avanzado'),
	        'file'          => '/image/upload/specialties/orden_cerrado_avanzado.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 048 - Orden Cerrado - Avanzado.pdf',
	        'imagename' 	=> '/image/upload/specialties/orden_cerrado_avanzado.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #31
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Atletismo',
	        'description' 	=> 'AR 049 - Especialidad de Atletismo, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Atletismo'),
	        'file'          => '/image/upload/specialties/atletismo.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 049 - Atletismo.pdf',
	        'imagename' 	=> '/image/upload/specialties/atletismo.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #32
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Caminata con mochila',
	        'description' 	=> 'AR 056 - Especialidad de Caminata con mochila, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Caminata con mochila'),
	        'file'          => '/image/upload/specialties/caminata_con_mochila.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 056 - Caminata con mochila.pdf',
	        'imagename' 	=> '/image/upload/specialties/caminata_con_mochila.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #33
		Specialty::create([
        	'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Liderazgo al aire libre',
	        'description' 	=> 'AR 057 - Especialidad de Liderazgo al aire libre, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Liderazgo al aire libre'),
	        'file'          => '/image/upload/specialties/liderazgo_al_aire_libre.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 057 - Liderazgo al aire libre.pdf',
	        'imagename' 	=> '/image/upload/specialties/liderazgo_al_aire_libre.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #34
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Futbol',
	        'description' 	=> 'AR 065 - Especialidad de Futbol, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Futbol'),
	        'file'          => '/image/upload/specialties/futbol.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 065 - Futbol.pdf',
	        'imagename' 	=> '/image/upload/specialties/futbol.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #35
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Seguridad Básica en el agua',
	        'description' 	=> 'AR 090 - Especialidad de Seguridad Básica en el agua, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Seguridad Básica en el agua'),
	        'file'          => '/image/upload/specialties/seguridad_basica_en_el_agua.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 090 - Seguridad Basica en el agua.pdf',
	        'imagename' 	=> '/image/upload/specialties/seguridad_basica_en_el_agua.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #36
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 6,
	        'name' 			=> 'Construcciones Rusticas',
	        'description' 	=> 'AR 101 - Especialidad de Construcciones Rusticas, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Construcciones Rusticas'),
	        'file'          => '/image/upload/specialties/construcciones_rusticas.jpg',
	        'filename' 		=> '/doc/upload/specialties/AR 101 - Construcciones Rusticas.pdf',
	        'imagename' 	=> '/image/upload/specialties/construcciones_rusticas.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #37
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 7,
	        'name' 			=> 'Primeros Auxilios Básico',
	        'description' 	=> 'CS 003 - Especialidad de Primeros Auxilios Básico, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Primeros Auxilios Básico'),
	        'file'          => '/image/upload/specialties/primeros_auxilios_basico.jpg',
	        'filename' 		=> '/doc/upload/specialties/CS 003 - Primeros Auxilios.pdf',
	        'imagename' 	=> '/image/upload/specialties/primeros_auxilios_basico.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #38
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 7,
	        'name' 			=> 'Nutrición',
	        'description' 	=> 'CS 008 - Especialidad de Nutrición, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Nutrición'),
	        'file'          => '/image/upload/specialties/nutricion.jpg',
	        'filename' 		=> '/doc/upload/specialties/CS 008 - Nutricion.pdf',
	        'imagename' 	=> '/image/upload/specialties/nutricion.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #39
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 7,
	        'name' 			=> 'Rescate básico',
	        'description' 	=> 'CS 012 - Especialidad de Rescate básico, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Rescate básico'),
	        'file'          => '/image/upload/specialties/rescate_basico.jpg',
	        'filename' 		=> '/doc/upload/specialties/CS 012 - Rescate Básico.pdf',
	        'imagename' 	=> '/image/upload/specialties/rescate_basico.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #40
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 7,
	        'name' 			=> 'Higiene Oral',
	        'description' 	=> 'CS 023 - Especialidad de Higiene Oral, perteneciente al Área de Actividades recreativas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Higiene Oral'),
	        'file'          => '/image/upload/specialties/higiene_oral.jpg',
	        'filename' 		=> '/doc/upload/specialties/CS 023 - Higiene Oral.pdf',
	        'imagename' 	=> '/image/upload/specialties/higiene_oral.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #41
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Astronomía',
	        'description' 	=> 'EN 002 - Especialidad de Astronomía, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Astronomía'),
	        'file'          => '/image/upload/specialties/astronomia.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 002 - Astronomia.pdf',
	        'imagename' 	=> '/image/upload/specialties/astronomia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #42
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Aves',
	        'description' 	=> 'EN 003 - Especialidad de Aves, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Aves'),
	        'file'          => '/image/upload/specialties/aves.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 003 - Aves.pdf',
	        'imagename' 	=> '/image/upload/specialties/aves.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #43
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Aves Domesticas',
	        'description' 	=> 'EN 004 - Especialidad de Aves Domesticas, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Aves Domesticas'),
	        'file'          => '/image/upload/specialties/aves_domesticas.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 004 - Aves Domesticas.pdf',
	        'imagename' 	=> '/image/upload/specialties/aves_domesticas.jpg',
	        'status'        => 'PUBLISHED'
        ]);

       	#44
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Flores',
	        'description' 	=> 'EN 005 - Especialidad de Flores, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Flores'),
	        'file'          => '/image/upload/specialties/flores.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 005 - Flores.pdf',
	        'imagename' 	=> '/image/upload/specialties/flores.jpg',
	        'status'        => 'PUBLISHED'
        ]);

       	#45
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Arboles',
	        'description' 	=> 'EN 006 - Especialidad de Arboles, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Arboles'),
	        'file'          => '/image/upload/specialties/arboles.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 006 - Arboles.pdf',
	        'imagename' 	=> '/image/upload/specialties/arboles.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #46
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Mamíferos',
	        'description' 	=> 'EN 010 - Especialidad de Mamíferos, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Mamíferos'),
	        'file'          => '/image/upload/specialties/mamiferos.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 010 - Mamiferos.pdf',
	        'imagename' 	=> '/image/upload/specialties/mamiferos.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #47
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Reptiles',
	        'description' 	=> 'EN 011 - Especialidad de Reptiles, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Reptiles'),
	        'file'          => '/image/upload/specialties/reptiles.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 011 - Reptiles.pdf',
	        'imagename' 	=> '/image/upload/specialties/reptiles.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #48
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Moluscos',
	        'description' 	=> 'EN 014 - Especialidad de Moluscos, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Moluscos'),
	        'file'          => '/image/upload/specialties/moluscos.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 014 - Moluscos.pdf',
	        'imagename' 	=> '/image/upload/specialties/moluscos.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #49
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Cactus',
	        'description' 	=> 'EN 015 - Especialidad de Cactus, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Cactus'),
	        'file'          => '/image/upload/specialties/cactus.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 015 - Cactus.pdf',
	        'imagename' 	=> '/image/upload/specialties/cactus.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #50
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Climatología',
	        'description' 	=> 'EN 016 - Especialidad de Climatología, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Climatología'),
	        'file'          => '/image/upload/specialties/climatologia.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 016 - Climatologia.pdf',
	        'imagename' 	=> '/image/upload/specialties/climatologia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #51
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Arbustos',
	        'description' 	=> 'EN 019 - Especialidad de Arbustos, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Arbustos'),
	        'file'          => '/image/upload/specialties/arbustos.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 019 - Arbustos.pdf',
	        'imagename' 	=> '/image/upload/specialties/arbustos.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #52
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Anfibios',
	        'description' 	=> 'EN 023 - Especialidad de Anfibios, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Anfibios'),
	        'file'          => '/image/upload/specialties/anfibios.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 023 - Anfibios.pdf',
	        'imagename' 	=> '/image/upload/specialties/anfibios.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #53
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Felinos',
	        'description' 	=> 'EN 024 - Especialidad de Felinos, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Felinos'),
	        'file'          => '/image/upload/specialties/felinos.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 024 - Felinos.pdf',
	        'imagename' 	=> '/image/upload/specialties/felinos.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #54
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Semillas',
	        'description' 	=> 'EN 040 - Especialidad de Semillas, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Semillas'),
	        'file'          => '/image/upload/specialties/semillas.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 040 - Semillas.pdf',
	        'imagename' 	=> '/image/upload/specialties/semillas.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #55
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Ecología',
	        'description' 	=> 'EN 044 - Especialidad de Ecología, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Ecología'),
	        'file'          => '/image/upload/specialties/ecologia.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 044 - Ecologia.pdf',
	        'imagename' 	=> '/image/upload/specialties/ecologia.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #56
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Conservación Ambiental',
	        'description' 	=> 'EN 046 - Especialidad de Conservación Ambiental, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Conservación Ambiental'),
	        'file'          => '/image/upload/specialties/conservacion_ambiental.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 046 - Conservacion Ambiental.pdf',
	        'imagename' 	=> '/image/upload/specialties/conservacion_ambiental.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #57
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Rastreo de animales',
	        'description' 	=> 'EN 050 - Especialidad de Rastreo de animales, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Rastreo de animales'),
	        'file'          => '/image/upload/specialties/rastreo_de_animales.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 050 Rastreo de animales.pdf',
	        'imagename' 	=> '/image/upload/specialties/rastreo_de_animales.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #58
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 8,
	        'name' 			=> 'Animales en peligro de extinción',
	        'description' 	=> 'EN 058 - Especialidad de Animales en peligro de extinción, perteneciente al Área de Estudio de la Naturaleza.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Animales en peligro de extinción'),
	        'file'          => '/image/upload/specialties/animales_en_peligro_de_extincion.jpg',
	        'filename' 		=> '/doc/upload/specialties/EN 058 - Animales en peligro de extincion.pdf',
	        'imagename' 	=> '/image/upload/specialties/animales_en_peligro_de_extincion.jpg',
	        'status'        => 'PUBLISHED'
        ]);

        #59
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 9,
	        'name' 			=> 'Costura Básica',
	        'description' 	=> 'HD 009 - Especialidad de Costura Básica, perteneciente al Área de Habilidades Domesticas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Costura Básica'),
	        'file'          => '/image/upload/specialties/costura_basica.jpg',
	        'filename' 		=> '/doc/upload/specialties/HD 009 - Costura Básica.pdf',
	        'imagename' 	=> '/image/upload/specialties/costura_basica.jpg',
	        'status'        => 'PUBLISHED'
        ]);

		#60
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 9,
	        'name' 			=> 'Dibujo y pintura',
	        'description' 	=> 'HD 003 - Especialidad de Dibujo y pintura, perteneciente al Área de Habilidades Domesticas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Dibujo y pintura'),
	        'file'          => '/image/upload/specialties/dibujo_y_pintura.jpg',
	        'filename' 		=> '/doc/upload/specialties/HM 003 - Dibujo y pintura.pdf',
	        'imagename' 	=> '/image/upload/specialties/dibujo_y_pintura.jpg',
	        'status'        => 'PUBLISHED'
        ]);

		#61
		Specialty::create([
			'user_id' 		=> 30,
	        'specialty_area_id' => 9,
	        'name' 			=> 'Fabricación de velas',
	        'description' 	=> 'HD 046 - Especialidad de Fabricación de velas, perteneciente al Área de Habilidades Domesticas.',
	        'order' 		=> 3,
	        'slug' 			=> str_slug('Fabricación de velas'),
	        'file'          => '/image/upload/specialties/fabricacion_de_velas.jpg',
	        'filename' 		=> '/doc/upload/specialties/HM 046 - Fabricacion de velas.pdf',
	        'imagename' 	=> '/image/upload/specialties/fabricacion_de_velas.jpg',
	        'status'        => 'PUBLISHED'
        ]);

		// factory(Specialty::class, 5)->create();
    }
}
