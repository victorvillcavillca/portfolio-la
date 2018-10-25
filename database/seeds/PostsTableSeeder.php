<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 300)->create()->each(function(Post $post) {
            $post->tags()->attach([
                rand(1,5),
                rand(6,14),
                rand(15,20)
            ]);
        });

        Post::create([
            'user_id'     => 30,
            'category_id' => 4,
            'name'        => 'Especialidad Código Semáforo',
            'slug'        => str_slug('Especialidad Código Semáforo'),
            'excerpt'     => 'La Especialidad de Código Semáforo, perteneciente al Área de Actividades Profesionales. Es una de especialidades que más se aplicó en la década de los 90, hoy en día se está volviendo a retomar esta especialidad, aquí les presento las preguntas y algunas respuestas.',
            'body'        => '',
            'file'        => '/image/upload/posts/codigo-semaforo-post.png',
            'status'      => 'PUBLISHED'
        ])->each(function(Post $post) {
            // $post->tags()->attach([
            //     501,
            //     301,
            //     3
            // ]);
        });

        Post::create([
            'user_id'     => 30,
            'category_id' => 4,
            'name'        => 'Números, letras y posiciones básicas Especialidad de Código Semáforo',
            'slug'        => str_slug('Números, Letras y posiciones básicas Especialidad de Código Semáforo'),
            'excerpt'     => 'Posición de los brazos para realizar números, letras y posiciones básicas de la Especialidad de Código Semáforo.',
            'body'        => '',
            'file'        => '/image/upload/posts/codigo-semaforo-post.png',
            'status'      => 'PUBLISHED'
        ])->each(function(Post $post) {
            // $post->tags()->attach([
            //     502,
            //     302,
            //     3
            // ]);
        });
    }
}
