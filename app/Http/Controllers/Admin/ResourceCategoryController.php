<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceCategoryRequest;
use App\ResourceCategory;
use App\SpecialtyArea;
use Illuminate\Http\Request;

class ResourceCategoryController extends Controller
{
    /**
     * Create a new controller instance.
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
        return view('admin.resource-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resource-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceCategoryRequest $request)
    {
        // var_dump($request->all()); die();
        ResourceCategory::create($request->all());

        return redirect()->route('resource-categories.index')
                        ->with('info','Categoría de recurso creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  ResourceCategory  $resource_category
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceCategory $resource_category)
    {
        return view('admin.resource-categories.show', compact('resource_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ResourceCategory  $resource_category
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceCategory $resource_category)
    {
        return view('admin.resource-categories.edit', compact('resource_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SpecialtyArea  $resource_category
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceCategoryRequest $request, ResourceCategory $resource_category)
    {
        $resource_category->update($request->all());

        return redirect()->route('resource-categories.index')
                        ->with('info','Categoría de recurso Actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resourceCategory = ResourceCategory::find($id);
        $message = 'Eliminado la Categoría de recurso; '.$resourceCategory->name;
        $resourceCategory->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the Expenses posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = ResourceCategory::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.resource-categories.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}