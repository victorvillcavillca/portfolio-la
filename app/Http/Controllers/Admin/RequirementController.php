<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequirementRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Requirementarea;
use App\Requirement;

class RequirementController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'requirement');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requirement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requirementareasArray = Requirementarea::pluck('name', 'id')->toArray();
        
        $requirementareas[0] = '--- Seleccione la Área ---';
        foreach ($requirementareasArray as $id => $name) {
            $requirementareas[$id] = $name;
        }

        return view('admin.requirement.create_edit', compact('requirementareas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementRequest $request)
    {
        $requirement = new Requirement($request->all());
        $requirement->user_id = Auth::id();
        $requirement->save();

        $request->session()->flash('status', trans('modal.saved_successfully'));

        return redirect('/admin/requirements');
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
     * @param  Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        $requirementareasArray = Requirementarea::pluck('name', 'id')->toArray();
        
        $requirementareas[0] = '--- Seleccione la Área ---';
        foreach ($requirementareasArray as $id => $name) {
            $requirementareas[$id] = $name;
        }


        return view('admin.requirement.create_edit', compact('requirement','requirementareas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequirementRequest $request, Requirement $requirement)
    {
        $requirement->user_id_edited = Auth::id();
        $requirement->update($request->all());

        $request->session()->flash('status', trans('modal.edited_successfully'));

        return redirect('/admin/requirements');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $requirement = Requirement::find($id);
        $message = trans('admin/requirement.requirement').': <b>'.$requirement->name.'</b> '.trans('words.removed');
        $requirement->delete();
        return array('message' => $message);
    }

    /**
     * Show a list of all the categories posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
         $requirements = Requirement::whereNull('requirements.deleted_at')
            ->join('requirementareas', 'requirementareas.id', '=', 'requirements.requirementarea_id')
            ->select(array('requirements.id', 'requirements.detail', 'requirements.score', 'requirementareas.name as name_requirementarea', 'requirements.created_at'));

        return Datatables::of($requirements)
            ->add_column('actions', '')
            ->make();
    }
}