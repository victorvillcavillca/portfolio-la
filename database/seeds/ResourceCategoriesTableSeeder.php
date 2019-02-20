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
    	#1
		App\ResourceCategory::create([
        	'name' => 'Carpeta de Clases Regulares Agrupadas',
        	'slug' => str_slug('Carpeta de Clases Regulares Agrupadas'),
        	'description' => 'Carpeta de Clases Regulares Agrupadas para Líderes de Conquistadores, concuerda con los requisitos exigidos en la nueva tarjeta de Clases Agrupadas.',
        	'user_id' => 1
        ]);

        #2
		App\ResourceCategory::create([
        	'name' => 'Formularios de Secretaria Conquistadores',
        	'slug' => str_slug('Formularios de Secretaria Conquistadores'),
        	'description' => 'Formularios de Secretaria para el Club de Conquistadores de acuerdo al Manual Administrativo de Conquistadores (MAC).',
        	'user_id' => 1
        ]);

        #3
        App\ResourceCategory::create([
            'name' => 'Especialidades de Conquistadores ',
            'slug' => str_slug('Especialidades de Conquistadores '),
            'description' => 'Preguntas, respuestas, materia e información adicional para reforzar las respuestas de las Especialidades.',
            'user_id' => 1
        ]);

        #4
        App\ResourceCategory::create([
            'name' => 'Libro del Año 2018 Club de Conquistadores',
            'slug' => str_slug('Libro del Año 2018 Club de Conquistadores'),
            'description' => 'Materiales y Evaluaciones didácticas del Libro del Año 2018 del Club de Conquistadores.',
            'user_id' => 1
        ]);

		// factory(App\ResourceCategory::class, 5)->create();
    }
}
