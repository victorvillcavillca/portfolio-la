<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('index'));
});

// Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Inicio
Breadcrumbs::for('start', function ($trail) {
    $trail->parent('home');
    $trail->push('Pensamientos', route('home'));
});

// Home > Blog > Specialties
Breadcrumbs::for('specialties', function ($trail) {
    $trail->parent('blog');
    $trail->push('Especialidades', route('specialties'));
});

// Home > Blog > Specialties > Area Specialties
Breadcrumbs::for('area-specialties', function ($trail) {
    $trail->parent('specialties');
    $trail->push('Área de especialidades', route('specialties'));
});

// Home > Blog > Resources
Breadcrumbs::for('resources', function ($trail) {
    $trail->parent('blog');
    $trail->push('Recursos', route('resources'));
});

// Home > Blog > Resources > Category resources
Breadcrumbs::for('resource-categories', function ($trail) {
    $trail->parent('resources');
    $trail->push('Categoría de recursos', route('resources'));
});

// Home > Blog > Videos
Breadcrumbs::for('videos', function ($trail) {
    $trail->parent('blog');
    $trail->push('Videos', route('videos'));
});

// Home > Blog > videos > Category videos
Breadcrumbs::for('video-categories', function ($trail) {
    $trail->parent('videos');
    $trail->push('Categoría de videos', route('videos'));
});

// Home > Blog > Matters
Breadcrumbs::for('matters', function ($trail) {
    $trail->parent('blog');
    $trail->push('Materias', route('matters'));
});

// Home > Blog > Matters > Matter
Breadcrumbs::for('matter-detail', function ($trail) {
    $trail->parent('matters');
    $trail->push('Detalle materia', route('matters'));
});

// Home > Blog > Category
// Breadcrumbs::for('category', function ($trail) {
//     $trail->parent('blog');
//     $trail->push('Categorias', route('category'));
// });

// Home > Blog > Post
Breadcrumbs::for('post', function ($trail) {
    $trail->parent('blog');
    $trail->push('Detalle anuncio', url('post/{slug}'));
});

Breadcrumbs::for('category', function ($trail) {
    $trail->parent('blog');
    $trail->push('Categorías', url('post/{slug}'));
});

Breadcrumbs::for('tags', function ($trail) {
    $trail->parent('blog');
    $trail->push('Artículos relacionados', url('post/{slug}'));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });