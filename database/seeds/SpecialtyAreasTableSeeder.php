<?php

use Illuminate\Database\Seeder;

class SpecialtyAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	#1
		App\SpecialtyArea::create([
        	'name' => 'Actividades Recreativas',
        	'slug' => str_slug('Actividades Recreativas'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Actividades Recreativas'
        ]);
		#2
        App\SpecialtyArea::create([
        	'name' => 'Actividades Misioneras',
        	'slug' => str_slug('Actividades Misioneras'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Actividades Misioneras'
        ]);
        #3
        App\SpecialtyArea::create([
        	'name' => 'Artes y Habilidades Manuales',
        	'slug' => str_slug('Artes y Habilidades Manuales'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Artes y Habilidades Manuales'
        ]);
		#4
        App\SpecialtyArea::create([
        	'name' => 'Ciencia y Salud',
        	'slug' => str_slug('Ciencia y Salud'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Ciencia y Salud'
        ]);
        #5
        App\SpecialtyArea::create([
        	'name' => 'Habilidades Domesticas',
        	'slug' => str_slug('Habilidades Domesticas'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Habilidades Domesticas'
        ]);
        #6
        App\SpecialtyArea::create([
        	'name' => 'Actividades Profesionales',
        	'slug' => str_slug('Actividades Profesionales'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Actividades Profesionales'
        ]);
		#7
        App\SpecialtyArea::create([
        	'name' => 'Estudio de la Naturaleza',
        	'slug' => str_slug('Estudio de la Naturaleza'),
        	'description' => 'Especialidades del Club de Conquistadores en el Área de Estudio de la Naturaleza'
        ]);

        factory(App\SpecialtyArea::class, 20)->create();
    }
}
