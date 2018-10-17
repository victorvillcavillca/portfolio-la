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
        #Part 1
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte I: Generales',
            'order'         => 1,
            'slug'          => str_slug('Parte I: Generales'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte I; que comprende de la página 11 hasta la 20.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-1-20.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 2
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte II: Descubrimiento Espiritual',
            'order'         => 2,
            'slug'          => str_slug('Parte II: Descubrimiento Espiritual'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte II; que comprende de la página 21 hasta la 77.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-21-77.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 3
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte III: Sirviendo a los demas',
            'order'         => 3,
            'slug'          => str_slug('Parte III: Sirviendo a los demas'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte III; que comprende de la página 78 hasta la 84.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-78-84.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 4
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte IV: Desarrollo de la amistad',
            'order'         => 4,
            'slug'          => str_slug('Parte IV: Desarrollo de la amistad'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte IV; que comprende de la página 85 hasta la 91.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-85-91.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 5
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte V: Salud y actitud Física',
            'order'         => 5,
            'slug'          => str_slug('Parte V: Salud y actitud Física'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte V; que comprende de la página 92 hasta la 102.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-92-102.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 6
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte VI: Organización y Liderazgo',
            'order'         => 6,
            'slug'          => str_slug('Parte VI: Organización y Liderazgo'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte VI; que comprende de la página 103 hasta la 110.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-103-110.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 7
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte VII: Estudio de la Naturaleza',
            'order'         => 7,
            'slug'          => str_slug('Parte VII: Estudio de la Naturaleza'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte VII; que comprende de la página 111 hasta la 125.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-111-125.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #Part 8
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 1,
            'name'          => 'Parte VIII: Arte de Acampar',
            'order'         => 8,
            'slug'          => str_slug('Parte VIII: Arte de Acampar'),
            'description'   => 'Carpeta de Clases Regulares Agrupadas, parte VIII; que comprende de la página 126 hasta la 142.',
            'body'          => '',
            'file'          => '/image/upload/resources/carpeta-clases-regulares.png',
            'filename'      => '/doc/upload/resources/Escuela-de-Lideres-CUARTA-REGION-126-142.pdf',
            'imagename'     => '/image/upload/resources/carpeta-clases-regulares.png',
            'status'        => 'PUBLISHED'
        ]);

        #-------------------- Secretarial forms --------------------
        #1
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 2,
            'name'          => 'C01 Ficha de Registro del Club',
            'order'         => 9,
            'slug'          => str_slug('C01 Ficha de Registro del Club'),
            'description'   => 'Este formulario debe llenarse al Inicio de Gestión de cada año o cuando el Club es nuevo, una vez llenado debe presentarse a su Misión para ser registrado al Sistema de Gestión de Clubes.',
            'body'          => '',
            'file'          => '/image/upload/resources/document-edit-flat.png',
            'filename'      => '/doc/upload/resources/01-Registro-del-Club.pdf',
            'imagename'     => '/image/upload/resources/document-edit-flat.png',
            'status'        => 'PUBLISHED'
        ]);

        #2
        App\Resource::create([
            'user_id'       => 1,
            'resource_category_id' => 2,
            'name'          => 'C02 Solicitud de Cobertura de Seguro',
            'order'         => 9,
            'slug'          => str_slug('C02 Solicitud de Cobertura de Seguro'),
            'description'   => 'Este formulario debe llenarse al Inicio de Gestión de cada año o cuando el Club es nuevo, deben estar los datos de la Directiva, Consejeros y Conquistadores una vez llenado debe presentarse a su Misión para realizar la Solicitud de Cobertura de Seguro.',
            'body'          => '',
            'file'          => '/image/upload/resources/document-edit-flat.png',
            'filename'      => '/doc/upload/resources/02-Cobertura-de-Seguro.pdf',
            'imagename'     => '/image/upload/resources/document-edit-flat.png',
            'status'        => 'PUBLISHED'
        ]);

        factory(App\Resource::class, 300)->create()->each(function(App\Resource $resource) {
        	$resource->tags()->attach([
        		rand(1,5),
        		rand(6,14),
        		rand(15,20)
        	]);
        });
    }
}
