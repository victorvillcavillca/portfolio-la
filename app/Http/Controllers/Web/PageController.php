<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Post;
use App\Specialty;
use App\SpecialtyArea;

class PageController extends Controller
{
    public function blog(){
    	$posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

    	return view('web.posts', compact('posts'));
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->pluck('id')->first();

        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function tag($slug){ 
        $posts = Post::whereHas('tags', function($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function post($slug){
    	$post = Post::where('slug', $slug)->first();

    	return view('web.post', compact('post'));
    }

    /**
     * Display a listing of the specialties paginated.
     * 
     * @return \Illuminate\Http\Response
     */
    public function specialties(){
    	$specialties = Specialty::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(9);

    	return view('web.specialties', compact('specialties'));
    }

    /**
     * Display the specified specialty.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function specialty($slug){
        $specialty = Specialty::where('slug', $slug)->first();

        return view('web.specialty', compact('specialty'));
    }
}