<?php

namespace App\Http\Controllers\Admin;

use App\Evaluation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EvaluationRequest;
use App\Specialty;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /*Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.evaluations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.evaluations.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluationRequest $request)
    {
        $evaluation = Evaluation::create($request->all());
        $evaluation->save();

        return redirect()->route('evaluations.index')->with('info', 'Evaluación creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show a list of all the Expenses evaluations formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Evaluation::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.evaluations.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
