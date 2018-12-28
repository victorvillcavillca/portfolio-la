<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\CamporiClubRequest;
use App\CamporiClub;
use Carbon\Carbon;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CamporiClubController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'camporiclub');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.camporiclub.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.camporiclub.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CamporiClubRequest $request)
    {
        $camporiClub = new CamporiClub($request->all());
        $camporiClub->user_id = Auth::id();
        $camporiClub->save();

        $request->session()->flash('status', trans('modal.saved_successfully'));

        return redirect('/admin/camporiclubs');
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
    public function edit(CamporiClub $camporiclub)
    {
        return view('admin.camporiclub.create_edit',compact('camporiclub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  camporiclub  $camporiclub
     * @return \Illuminate\Http\Response
     */
    public function update(CamporiClubRequest $request, CamporiClub $camporiClub)
    {
        $camporiClub->user_id_edited = Auth::id();
        $camporiClub->update($request->all());

        $request->session()->flash('status', trans('modal.edited_successfully'));

        return redirect('/admin/camporiclubs');
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
     * Remove the specified camporiclub from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function remove($id)
    {
        $camporiClub = CamporiClub::find($id);
        $message = trans('admin/camporiclub.camporiclub').': <b>'.$camporiclub->name.'</b> '.trans('words.removed');
        $camporiClub->delete();
        return array('message' => $message);
    }
   
    /**
     * Show a list of all the camporiclubs posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $camporiClubs = CamporiClub::whereNull('campori_clubs.deleted_at')
            ->select(array('campori_clubs.id', 'campori_clubs.name', 'campori_clubs.district', 'campori_clubs.region', 'campori_clubs.total_score'));
        return Datatables::of($camporiClubs)
            ->add_column('actions', '')
            ->make();
    }
}
