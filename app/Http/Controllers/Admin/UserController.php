<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:users.index')->only('index');
        $this->middleware('permission:users.edit')->only(['edit','update']);
        $this->middleware('permission:users.show')->only('show');
        $this->middleware('permission:users.destroy')->only('destroy');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('admin.users.edit', compact('user', 'roles'));
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
        $user = User::find($id);
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $message = 'Eliminado el Usuario; '.$user->name;
        $user->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = User::select('id', 'name', 'email', 'created_at');

        return datatables()
            ->eloquent($query)
            // ->editColumn('status', 'admin.users.datatables.status')
            // ->editColumn('filename', 'admin.users.datatables.filename')
            // ->editColumn('resource_category_id', function(User $resource) {
            //         return $resource->resourceCategory->name;
            //     })
            ->addColumn('btn', 'admin.users.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show a list of all the questions of one Evaluation formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function dataevaluation()
    {
        $evaluation_id = $_GET['evaluation_id'];

        $query = User::join('evaluation_user', 'users.id', '=', 'evaluation_user.user_id')->select('id', 'name', 'email', 'users.created_at')->where('evaluation_user.evaluation_id', $evaluation_id);

        return datatables()
            ->eloquent($query)
            // ->editColumn('status', 'admin.users.datatables.status')
            // ->editColumn('filename', 'admin.users.datatables.filename')
            // ->editColumn('resource_category_id', function(User $resource) {
            //         return $resource->resourceCategory->name;
            //     })
            ->addColumn('btn', 'admin.evaluations.partials.actions_users')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
