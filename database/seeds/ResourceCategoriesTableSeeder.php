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

		factory(App\ResourceCategory::class, 20)->create();
    }
}
