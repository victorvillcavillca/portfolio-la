<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequirementAreaRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Requirementarea;

class RequirementAreaController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'requirementarea');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requirementarea.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requirementarea.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementAreaRequest $request)
    {
        $requirementArea = new Requirementarea($request->all());
        $requirementArea->user_id = Auth::id();
        $requirementArea->save();

        $request->session()->flash('status', trans('modal.saved_successfully'));

        return redirect('/admin/requirementareas');
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
     * @param  Requirementarea  $requirementarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirementarea $requirementarea)
    {
        return view('admin.requirementarea.create_edit',compact('requirementarea'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Requirementarea  $requirementarea
     * @return \Illuminate\Http\Response
     */
    public function update(RequirementAreaRequest $request, Requirimentarea $requirimentarea)
    {
        $requirementarea->user_id_edited = Auth::id();
        $requirementarea->update($request->all());

        $request->session()->flash('status', trans('modal.edited_successfully'));

        return redirect('/admin/requirementareas');
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
     * Remove the specified requirementarea from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function remove($id)
    {
        $requirementarea = Requirementarea::find($id);
        $message = trans('admin/requirementarea.requirementarea').': <b>'.$requirementarea->name.'</b> '.trans('words.removed');
        $requirementarea->delete();
        return array('message' => $message);
    }
   
    /**
     * Show a list of all the requirementareas posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $requirementareas = Requirementarea::whereNull('requirementareas.deleted_at')
            ->select(array('requirementareas.id', 'requirementareas.name', 'requirementareas.total_score', 'requirementareas.description','requirementareas.created_at'));
        return Datatables::of($requirementareas)
            ->add_column('actions', '')
            ->make();
    }
}
