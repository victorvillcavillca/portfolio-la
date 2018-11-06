<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MatterRequest;
use App\Http\Requests\Admin\MatterUpdateRequest;
use App\Management;
use App\Matter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatterController extends Controller
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
        return view('admin.matters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managements = Management::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.matters.create', compact('managements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatterRequest $request)
    {
        $matter = new Matter($request->all());
        $matter->user_id = Auth::id();
        $matter->save();

        return redirect()->route('matters.index')
                        ->with('info','Materia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Matter  $matter
     * @return \Illuminate\Http\Response
     */
    public function show(Matter $matter)
    {
        return view('admin.matters.show', compact('matter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Matter  $matter
     * @return \Illuminate\Http\Response
     */
    public function edit(Matter $matter)
    {
        $managements = Management::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.matters.edit', compact('matter', 'managements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatterUpdateRequest $request, $id)
    {
        $matter = Matter::find($id);
        $matter->update($request->all());

        return redirect()->route('matters.index')
                        ->with('info','Materia Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matter::find($id)->delete();
        return;
    }

    /**
     * Show a list of all the Matters formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Matter::select('id', 'name', 'status', 'created_at');

        return datatables()
            ->eloquent($query)
            ->editColumn('status', 'admin.matters.datatables.status')
            ->addColumn('btn', 'admin.matters.partials.actions')
            ->rawColumns(['status','btn'])
            ->toJson();
    }
}
