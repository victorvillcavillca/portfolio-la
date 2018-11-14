<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
	public function __construct()
    {
        $this->middleware('permission:roles.create')->only(['create','store']);
        $this->middleware('permission:roles.index')->only('index');
        $this->middleware('permission:roles.edit')->only(['edit','update']);
        $this->middleware('permission:roles.show')->only('show');
        $this->middleware('permission:roles.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit', $role->id)
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        $permissions = Permission::get();

        return view('admin.roles.edit', compact('role', 'permissions'));
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
        $role = Role::find($id);
        $role->update($request->all());


        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit', $role->id)
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role = Role::find($id)->delete();

        // return back()->with('info', 'Eliminado correctamente');

        $role = Role::find($id);
        $message = 'Eliminado el recurso; '.$role->name;
        $role->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the Expenses roles formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Role::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.roles.partials.actions')
            ->editColumn('created_at', function(Role $role) {
                    return $role->created_at->format('d-m-Y');
                })
            ->rawColumns(['btn'])
            ->toJson();
    }
}
