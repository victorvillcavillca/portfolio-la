<?php

namespace App\Http\Controllers\Admin;

use App\Evaluation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionStoreRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
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
        return view('admin.questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluation_id = $_GET['evaluation_id'];

        // $evaluations = Evaluation::orderBy('name','ASC')->pluck('name','id');
        return view('admin.questions.create', compact('evaluation_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request)
    {
        $question = new Question($request->all());
        $question->user_id = Auth::id();
        $question->save();

        // return redirect()->route('questions.index')->with('info', 'Pregunta creada con éxito');
        return redirect()->route('evaluations.edit', $request->get('evaluation_id'))->with('info', 'Pregunta creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $evaluation_id = $question->evaluation_id;
        return view('admin.questions.edit', compact('evaluation_id','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionStoreRequest $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->route('evaluations.edit', $request->get('evaluation_id'))->with('info', 'Pregunta actualizada con éxito');

        // return redirect()->route('questions.index')
        //                 ->with('info','Pregunta Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $message = 'Eliminado la Pregunta; '.$question->name;
        $question->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the questions of one Evaluation formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $evaluation_id = $_GET['evaluation_id'];
        $query = Question::select('id', 'question', 'answer', 'created_at')->where('evaluation_id', $evaluation_id);

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.questions.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}