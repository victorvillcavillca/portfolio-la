<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SpecialtyArea;
use App\Http\Requests\SpecialtyAreaRequest;

class SpecialtyAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.specialty-areas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialty-areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyAreaRequest $request)
    {  
        SpecialtyArea::create($request->all());
   
        return redirect()->route('specialty-areas.index')
                        ->with('info','Area de Especialidad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  SpecialtyArea  $specialty_area
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialtyArea $specialty_area)
    {
        return view('admin.specialty-areas.show', compact('specialty_area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SpecialtyArea  $specialty_area
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecialtyArea $specialty_area)
    {
        return view('admin.specialty-areas.edit', compact('specialty_area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SpecialtyArea  $specialty_area
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyAreaRequest $request, SpecialtyArea $specialty_area)
    {
        $specialty_area->update($request->all());
  
        return redirect()->route('specialty-areas.index')
                        ->with('info','Area de Especialidad Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialty_area = SpecialtyArea::find($id)->delete();
        return;

        // return back()->with('info', 'Eliminado correctamente');
    }

    /**
     * Show a list of all the Expenses posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = SpecialtyArea::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.specialty-areas.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}