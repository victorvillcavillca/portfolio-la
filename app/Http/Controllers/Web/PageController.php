<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Resource;
use App\ResourceCategory;
use App\Specialty;
use App\SpecialtyArea;
use App\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);
        return view('home', compact('posts'));
    }

    public function blog(){
    	$posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

    	return view('web.posts', compact('posts'));
    }

    public function category($slug){
        $category_id = Category::where('slug', $slug)->pluck('id')->first();

        $posts = Post::where('category_id', $category_id)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        $name_bread = 'category';
        return view('web.category', compact('posts','name_bread'));
    }

    public function tag($slug){
        $posts = Post::whereHas('tags', function($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        $name_bread = 'tags';
        return view('web.category', compact('posts','name_bread'));
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

        $name_bread = 'specialties';
    	return view('web.specialties', compact('specialties','specialty_areas','name_bread'));
    }

    /**
     * Display the specified specialties by Area.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function specialtyArea($slug){
        $specialtyArea = SpecialtyArea::where('slug', $slug)->pluck('id')->first();
        $area_name = SpecialtyArea::where('slug', $slug)->first()->name;

        $specialties = Specialty::where('specialty_area_id', $specialtyArea)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

        $specialty_areas = SpecialtyArea::orderBy('id', 'DESC')->get();

        $name_bread = 'area-specialties';
        return view('web.specialties', compact('specialties','specialty_areas','area_name','name_bread'));
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

    /**
     * Display a listing of the resources paginated.
     *
     * @return \Illuminate\Http\Response
     */
    public function resources(){
        $resources = Resource::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

        $resource_categories = ResourceCategory::orderBy('id', 'DESC')->get();

        $name_bread = 'resources';
        return view('web.resources', compact('resources','resource_categories','name_bread'));
    }

    /**
     * Display the specified resources by Category.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function resourceCategory($slug){
        $resourceCategory = ResourceCategory::where('slug', $slug)->pluck('id')->first();
        $category_name = ResourceCategory::where('slug', $slug)->first()->name;

        $resources = Resource::where('resource_category_id', $resourceCategory)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

        $resource_categories = ResourceCategory::orderBy('id', 'DESC')->get();

        $name_bread = 'resource-categories';
        return view('web.resources', compact('resources','resource_categories','category_name','name_bread'));
    }
}