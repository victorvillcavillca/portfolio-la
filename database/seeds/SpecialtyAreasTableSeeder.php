<?php

use App\SpecialtyArea;
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
        SpecialtyArea::create([
            'name' => 'ADRA',
            'slug' => str_slug('ADRA'),
            'description' => 'AD - Especialidades del Club de Conquistadores en el Área de ADRA'
        ]);

        #2
        SpecialtyArea::create([
            'name' => 'Artes y Habilidades Manuales',
            'slug' => str_slug('Artes y Habilidades Manuales'),
            'description' => 'AM - Especialidades del Club de Conquistadores en el Área de Artes y Habilidades Manuales'
        ]);

    	#3
		SpecialtyArea::create([
        	'name' => 'Actividades agrícolas',
        	'slug' => str_slug('Actividades agrícolas'),
        	'description' => 'AA - Especialidades del Club de Conquistadores en el Área de Actividades agrícolas'
        ]);

		#4
        SpecialtyArea::create([
        	'name' => 'Actividades misioneras y comunitarias',
        	'slug' => str_slug('Actividades misioneras y comunitarias'),
        	'description' => 'AM - Especialidades del Club de Conquistadores en el Área de Actividades misioneras y comunitarias'
        ]);

        #5
        SpecialtyArea::create([
        	'name' => 'Actividades profesionales',
        	'slug' => str_slug('Actividades profesionales'),
        	'description' => 'AP - Especialidades del Club de Conquistadores en el Área de Actividades profesionales'
        ]);

		#6
        SpecialtyArea::create([
        	'name' => 'Actividades recreativas',
        	'slug' => str_slug('Actividades recreativas'),
        	'description' => 'AR - Especialidades del Club de Conquistadores en el Área de Actividades recreativas'
        ]);

        #7
        SpecialtyArea::create([
        	'name' => 'Ciencia y Salud',
        	'slug' => str_slug('Ciencia y Salud'),
        	'description' => 'CS - Especialidades del Club de Conquistadores en el Área de Ciencia y Salud'
        ]);

        #8
        SpecialtyArea::create([
        	'name' => 'Estudio de la Naturaleza',
        	'slug' => str_slug('Estudio de la Naturaleza'),
        	'description' => 'EN - Especialidades del Club de Conquistadores en el Área de Estudio de la Naturaleza'
        ]);

		#9
        SpecialtyArea::create([
            'name' => 'Habilidades Domesticas',
            'slug' => str_slug('Habilidades Domesticas'),
            'description' => 'HD - Especialidades del Club de Conquistadores en el Área de Habilidades Domesticas'
        ]);

        #10
        SpecialtyArea::create([
            'name' => 'Maestrías',
            'slug' => str_slug('Maestrías'),
            'description' => 'ME - Especialidades del Club de Conquistadores en el Área de Maestrías'
        ]);
        // factory(SpecialtyArea::class, 5)->create();
    }
}
