<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceStoreRequest;
use App\Http\Requests\Admin\ResourceUpdateRequest;
use App\Resource;
use App\ResourceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
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
        return view('admin.resources.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource_categories = ResourceCategory::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.resources.create', compact('resource_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceStoreRequest $request)
    {
        $resource = Resource::create($request->all());
        // $this->authorize('pass', $resource);

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image/upload/resources',  $request->file('image'));
            $resource->fill(['file' => asset($path)]);
        }

        // var_dump($request->file('filename')); die();
        if($request->file('filename')){
            $path_doc = Storage::disk('public')->put('doc/upload/resources',  $request->file('filename'));
            $resource->fill(['filename' => asset($path_doc)]);

            // $file = Input::file('filename');
            // $filename = $file->getClientOriginalName();
            // $resource->filename = 'documents/uploads/resources/'.$filename;
            // $file->move('documents/uploads/resources', $filename);
        }

        $resource->save();
        //TAGS
        // $resource->tags()->attach($request->get('tags'));

        // return redirect()->route('resources.edit', $resource->id)->with('info', 'Especialidad creada con éxito');
        return redirect()->route('resources.index')->with('info', 'Recurso creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return view('admin.resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        $resource_categories = ResourceCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        // $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.resources.edit', compact('resource_categories','resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceUpdateRequest $request, Resource $resource)
    {
        // $resource = resource::find($id);
        // $this->authorize('pass', $resource);

        $resource->fill($request->all())->save();

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image/upload/resources',  $request->file('image'));
            $resource->fill(['file' => asset($path)]);
        }

        // DOC
        if($request->file('filename')){
            $path_doc = Storage::disk('public')->put('doc/upload/resources',  $request->file('filename'));
            $resource->fill(['filename' => asset($path_doc)]);
        }

        $resource->save();
        //TAGS
        // $resource->tags()->sync($request->get('tags'));

        return redirect()->route('resources.index')->with('info', 'Especialidad actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialty_area = Resource::find($id)->delete();
        return;
    }

    /**
     * Show a list of all the Expenses resources formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Resource::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.resources.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
