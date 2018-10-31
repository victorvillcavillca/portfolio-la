<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

        return view('web.index');
    }

    /**
     * Show the view to list thughts all.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return view('read');
    }
}
