<?php

namespace App\Http\Controllers\Admin;

use App\EvaluationCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EvaluationCategoryRequest;
use App\Http\Requests\Admin\EvaluationCategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationCategoryController extends Controller
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
        return view('admin.evaluation-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.evaluation-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluationCategoryRequest $request)
    {
        $evaluationCategory = new EvaluationCategory($request->all());
        $evaluationCategory->user_id = Auth::id();
        $evaluationCategory->save();

        return redirect()->route('evaluation-categories.index')
                        ->with('info','Categoría de Evaluación created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  EvaluationCategory  $evaluationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EvaluationCategory $evaluationCategory)
    {
        return view('admin.evaluation-categories.show', compact('evaluationCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EvaluationCategory  $evaluationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EvaluationCategory $evaluationCategory)
    {
        return view('admin.evaluation-categories.edit', compact('evaluationCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvaluationCategoryUpdateRequest $request, $id)
    {
        $evaluationCategory = EvaluationCategory::find($id);
        $evaluationCategory->update($request->all());

        return redirect()->route('evaluation-categories.index')
                        ->with('info','Categoría de Evaluación Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EvaluationCategory::find($id)->delete();
        return;
    }

    /**
     * Show a list of all the Expenses posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = EvaluationCategory::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.evaluation-categories.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}