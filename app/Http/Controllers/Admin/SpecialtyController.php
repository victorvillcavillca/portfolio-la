<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyStoreRequest;
use App\Specialty;
use App\SpecialtyArea;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $specialties = Specialty::paginate();
        return view('admin.specialties.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialty_areas = SpecialtyArea::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.specialties.create', compact('specialty_areas', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyStoreRequest $request)
    {
        $specialty = Specialty::create($request->all());
        // $this->authorize('pass', $specialty);

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image/upload/specialties',  $request->file('image'));
            $specialty->fill(['file' => asset($path)]);
        }

        // var_dump($request->file('filename')); die();
        if($request->file('filename')){
            $path_doc = Storage::disk('public')->put('doc/upload/specialties',  $request->file('filename'));
            $specialty->fill(['filename' => asset($path_doc)]);

            // $file = Input::file('filename');
            // $filename = $file->getClientOriginalName();
            // $resource->filename = 'documents/uploads/resources/'.$filename;
            // $file->move('documents/uploads/resources', $filename);
        }

        $specialty->save();
        //TAGS
        // $specialty->tags()->attach($request->get('tags'));

        // return redirect()->route('specialties.edit', $specialty->id)->with('info', 'Especialidad creada con éxito');
        return redirect()->route('specialties.index')->with('info', 'Especialidad creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialty = Specialty::find($id);
        // $this->authorize('pass', $specialty);

        return view('admin.specialties.show', compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        $specialty_areas = SpecialtyArea::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.specialties.edit', compact('specialty_areas', 'tags', 'specialty'));
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
        $specialty = Specialty::find($id);
        // $this->authorize('pass', $specialty);

        $specialty->fill($request->all())->save();

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image/upload/specialties',  $request->file('image'));
            $specialty->fill(['file' => asset($path)]);
        }

        // DOC
        if($request->file('filename')){
            $path_doc = Storage::disk('public')->put('doc/upload/specialties',  $request->file('filename'));
            $specialty->fill(['filename' => asset($path_doc)]);
        }

        $specialty->save();
        //TAGS
        // $specialty->tags()->sync($request->get('tags'));

        return redirect()->route('specialties.index')->with('info', 'Especialidad actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialty = Specialty::find($id);
        $message = 'Eliminado la Especialidad; '.$specialty->name;
        $specialty->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the Expenses specialties formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Specialty::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.specialties.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
