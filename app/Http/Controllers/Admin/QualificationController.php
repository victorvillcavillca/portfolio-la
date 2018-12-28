<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\QualificationRequest;
use App\Qualification;
use Carbon\Carbon;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class QualificationController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'qualification');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.qualification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qualification.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QualificationRequest $request)
    {
        $qualification = new Qualification($request->all());
        $qualification->user_id = Auth::id();
        $qualification->save();

        $request->session()->flash('status', trans('modal.saved_successfully'));

        return redirect('/admin/qualifications');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        return view('admin.qualification.create_edit',compact('qualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QualificationRequest $request, Qualification $qualification)
    {
        $qualification->user_id_edited = Auth::id();
        $qualification->update($request->all());

        $request->session()->flash('status', trans('modal.edited_successfully'));

        return redirect('/admin/qualifications');
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
     * Remove the specified qualification from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function remove($id)
    {
        $qualification = Qualification::find($id);
        $message = trans('admin/qualification.qualification').': <b>'.$qualification->name.'</b> '.trans('words.removed');
        $qualification->delete();
        return array('message' => $message);
    }
   
    /**
     * Show a list of all the qualifications posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $qualifications = Qualification::whereNull('qualifications.deleted_at')
            ->select(array('qualifications.id', 'qualifications.category', 'qualifications.maximum_score', 'qualifications.initial_percentage', 'qualifications.initial_score', 'qualifications.final_percentage', 'qualifications.final_score'));
        return Datatables::of($qualifications)
            ->add_column('actions', '')
            ->make();
    }
}