<?php

namespace App\Http\Controllers\Admin;

use App\Evaluation;
use App\EvaluationCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EvaluationRequest;
use App\Http\Requests\Admin\EvaluationUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $evaluation_categories = EvaluationCategory::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.evaluations.create', compact('evaluation_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluationRequest $request)
    {
        $evaluation = new Evaluation($request->all());
        $evaluation->user_id = Auth::id();
        $evaluation->save();

        return redirect()->route('evaluations.index')->with('info', 'Evaluación creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        return view('admin.evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        $evaluation_categories = EvaluationCategory::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.evaluations.edit', compact('evaluation_categories','evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(EvaluationUpdateRequest $request, Evaluation $evaluation)
    {
        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
                        ->with('info','Evaluación Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evaluation::find($id)->delete();
        return;
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
