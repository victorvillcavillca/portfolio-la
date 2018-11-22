<?php

namespace App\Http\Controllers\Web;

use App\Evaluation;
use App\Http\Controllers\Controller;
use App\Matter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EvaluationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $matters = Matter::orderBy('id', 'DESC')->where('status', false)->paginate(6);
        return view('web.matters.index', compact('matters'));
    }

    /**
     * Display a listing of the resources paginated.
     *
     * @return \Illuminate\Http\Response
     */
    public function evaluations(){
        $evaluations = Evaluation::orderBy('id', 'DESC')->where('status', true)->paginate(6);

        $matters = Matter::orderBy('id', 'DESC')->get();

        $name_bread = 'evaluations';
        return view('web.evaluations', compact('evaluations','matters','name_bread'));
    }

	/**
     * Display a listing of the resources paginated.
     *
     * @return \Illuminate\Http\Response
     */
    public function evaluation($slug){
    	$evaluation = Evaluation::where('slug', $slug)->first();

    	return view('web.evaluation', compact('evaluation'));
    }

    /**
     * Display a listing of the resources paginated.
     *
     * @return \Illuminate\Http\Response
     */
    public function matters(){
        $matters = Matter::orderBy('id', 'DESC')->where('status', true)->paginate(6);

        $matters = Matter::orderBy('id', 'DESC')->get();

        $name_bread = 'matters';
        return view('web.matters', compact('matters','matters','name_bread'));
    }

    /**
     * Display the specified matters by Category.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    // public function matter($slug){
    //     $matter = Matter::where('slug', $slug)->pluck('id')->first();
    //     $matter_name = Matter::where('slug', $slug)->first()->name;

    //     $evaluations = Evaluation::where('matter_id', $matter)->orderBy('id', 'DESC')->where('status', false)->paginate(6);

    //     $matters = Matter::orderBy('id', 'DESC')->get();

    //     $name_bread = 'matters';
    //     return view('web.matters.matter', compact('evaluations','matters','matter_name','name_bread'));
    // }

    public function matter($slug){

        $matter = Matter::where('slug', $slug)->first();
        $matter_name = Matter::where('slug', $slug)->first()->name;

        $evaluations = Evaluation::where('matter_id', $matter->id)->orderBy('id', 'DESC')->where('status', false)->paginate(6);

        $name_bread = 'specialties';
        return view('web.matters.matter', compact('matter','evaluations','matter_name','name_bread'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matter = $request->get();
        // $evaluation = new Evaluation($request->all());
        // $evaluation->user_id = Auth::id();
        // $evaluation->save();

        // return redirect()->route('evaluations.edit', $evaluation->id)->with('info', 'Evaluación creada con éxito');

        // $matters = Matter::orderBy('id', 'DESC')->where('status', false)->paginate(6);
        // return view('web.matters.index', compact('matters'));

    }


}
