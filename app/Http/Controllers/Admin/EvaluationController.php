<?php

namespace App\Http\Controllers\Admin;

use App\Evaluation;
use App\Matter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EvaluationRequest;
use App\Http\Requests\Admin\EvaluationUpdateRequest;
use App\Question;
use Carbon\Carbon;
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
        $matters = Matter::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.evaluations.create', compact('matters'));
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

        return redirect()->route('evaluations.edit', $evaluation->id)->with('info', 'Evaluación creada con éxito');
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
        $evaluation->end_date = Carbon::parse($evaluation->end_date)->format('Y-m-d');
        $matters = Matter::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.evaluations.edit', compact('matters','evaluation'));
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
        $evaluation = Evaluation::find($id);
        $message = 'Eliminado la Evaluación; '.$evaluation->name;
        $evaluation->delete();

        return array('message' => $message);
    }

    /**
     * View the specified resource.
     *
     * @param  App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function view(Evaluation $evaluation)
    {
        // $participants = $evaluation->participants;
        // foreach ($participants as $participant) {
        //     echo $participant->name;

        // }
        // // die();
        return view('admin.evaluations.view', compact('evaluation'));
    }

    /**
     * Result the specified resource.
     *
     * @param  App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function result(Evaluation $evaluation)
    {
        return view('admin.evaluations.result', compact('evaluation'));
    }

    /**
     * Add the specified resource.
     *
     * @param  App\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function add(Evaluation $evaluation)
    {
        return view('admin.evaluations.add', compact('evaluation'));
    }

    /**
     * Show a list of all the evaluations formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Evaluation::select('id', 'name', 'description', 'status', 'matter_id');

        return datatables()
            ->eloquent($query)
            // ->setRowClass('{{ $id % 2 == 0 ? "alert-success":"alert-warning" }}')
            ->editColumn('status', 'admin.evaluations.datatables.status')
            ->editColumn('matter_id', function(Evaluation $evaluation) {
                return $evaluation->matter->name;
            })
            ->addColumn('btn_participants', 'admin.evaluations.partials.actions_participants')
            ->addColumn('btn', 'admin.evaluations.partials.actions')
            ->rawColumns(['btn_participants','status','btn'])
            ->toJson();
    }

    /**
     * Show a list of all the evaluations formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function datauser()
    {
        $query = User::select('id', 'name', 'description', 'status', 'matter_id');

        return datatables()
            ->eloquent($query)
            // ->setRowClass('{{ $id % 2 == 0 ? "alert-success":"alert-warning" }}')
            ->editColumn('status', 'admin.evaluations.datatables.status')
            ->editColumn('matter_id', function(Evaluation $evaluation) {
                return $evaluation->matter->name;
            })
            ->addColumn('btn_participants', 'admin.evaluations.partials.actions_participants')
            ->addColumn('btn', 'admin.evaluations.partials.actions')
            ->rawColumns(['btn_participants','status','btn'])
            ->toJson();
    }
}