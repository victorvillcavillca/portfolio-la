<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
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

// Home > Blog > Specialties
Breadcrumbs::for('specialties', function ($trail) {
    $trail->parent('blog');
    $trail->push('Especialidades', route('specialties'));
});

// Home > Blog > Resources
Breadcrumbs::for('resources', function ($trail) {
    $trail->parent('blog');
    $trail->push('Recursos', route('resources'));
});

// Home > Blog > Category
// Breadcrumbs::for('category', function ($trail) {
//     $trail->parent('blog');
//     $trail->push('Categorias', route('category'));
// });

// Home > Blog > Post
Breadcrumbs::for('post', function ($trail) {
    $trail->parent('blog');
    $trail->push('Post', url('post/{slug}'));
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