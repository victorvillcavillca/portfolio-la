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
    	$posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

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
    	$specialties = Specialty::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

        $specialty_areas = SpecialtyArea::orderBy('id', 'DESC')->get();

    	return view('web.specialties2', compact('specialties','specialty_areas'));
    }

    /**
     * Display the specified specialties by Area.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function specialtyArea($slug){
        $specialtyArea = SpecialtyArea::where('slug', $slug)->pluck('id')->first();

        $specialties = Specialty::where('specialty_area_id', $specialtyArea)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

        $specialty_areas = SpecialtyArea::orderBy('id', 'DESC')->get();

        return view('web.specialties2', compact('specialties','specialty_areas'));
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