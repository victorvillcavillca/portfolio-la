<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ManagementsDataTable;
use App\DataTables\ManagementsDataTablesEditor;
use App\Http\Controllers\Controller;
use App\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index(ManagementsDataTable $dataTable)
    {
        return $dataTable->render('admin.managements.index');
    }

    public function store(ManagementsDataTablesEditor $editor)
    {
        return $editor->process(request());
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return view('admin.managements.index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    // /**
    //  * Show a list of all the evaluations formatted for Datatables.
    //  *
    //  * @return Datatables JSON
    //  */
    // public function data()
    // {
    //     $query = Management::select('id', 'name', 'status','created_at');

    //     return datatables()
    //         ->eloquent($query)
    //         ->editColumn('status', 'admin.managements.datatables.status')
    //         ->addColumn('btn', 'admin.evaluations.partials.actions')
    //         ->rawColumns(['intro','status','btn'])
    //         ->toJson();
    // }
}
