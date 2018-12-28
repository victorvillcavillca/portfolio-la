<?php

namespace App\Http\Controllers\Web;

use App\Evaluation;
use App\Http\Controllers\Controller;
use App\Matter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MatterController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	/**
     * Display a listing of the matters.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matters = Matter::orderBy('id', 'DESC')->where('status', false)->paginate(6);
        return view('web.matters.index', compact('matters'));
    }

    /**
     * Display the specified matter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function matter($slug){

        $matter = Matter::where('slug', $slug)->first();
        $matter_name = Matter::where('slug', $slug)->first()->name;

        $evaluations = Evaluation::where('matter_id', $matter->id)->orderBy('id', 'DESC')->where('status', false)->paginate(6);

        $name_bread = 'specialties';
        return view('web.matters.matter', compact('matter','evaluations','matter_name','name_bread'));
    }
}
