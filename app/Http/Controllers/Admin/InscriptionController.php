<?php

namespace App\Http\Controllers\Admin;

use App\EvaluationCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EvaluationCategoryRequest;
use App\Http\Requests\Admin\EvaluationCategoryUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
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
        return view('admin.inscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluationCategory = EvaluationCategory::find(100);
        $user = $evaluationCategory->users()->find(3);
        $final_score = 100;

        $evaluationCategory->users()->updateExistingPivot($user->id, compact('final_score'));
        // $user->roles()->updateExistingPivot($roleId, $attributes);
        return view('admin.inscriptions.create');
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

        return redirect()->route('inscriptions.index')
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
        return view('admin.inscriptions.show', compact('evaluationCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EvaluationCategory  $evaluationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usersSelected = [];
        $users = User::pluck('name', 'id')->toArray();
     //    count($users->count()); die();
     // echo count($users); die();

        $evaluationCategory = EvaluationCategory::findOrFail($id);
        return view('admin.inscriptions.edit', compact('evaluationCategory','users'));
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
        $evaluationCategory = EvaluationCategory::find($id);
        $evaluationCategory->update($request->except('users'));

        $users = $request->input('users');
        if ($users != NULL) {
            foreach ($users as $userId) {
                // $user = User::find((int)$userId);
                if (! $evaluationCategory->users->contains($userId)) {
                    $evaluationCategory->users()->attach((int)$userId, [
                    // $evaluationCategory->users()->save($user, [
                        'accepted' => true,
                        'approved' => false,
                        'evaluation_date' => now(),
                    ]);
                }

            }
        }

        return redirect()->route('inscriptions.index')
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
            ->addColumn('btn', 'admin.inscriptions.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
