<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoCategoryStoreRequest;
use App\Http\Requests\Admin\VideoCategoryUpdateRequest;
use App\VideoCategory;
use Illuminate\Http\Request;

class VideoCategoryController extends Controller
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
        return view('admin.video-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCategoryStoreRequest $request)
    {
        VideoCategory::create($request->all());

        return redirect()->route('video-categories.index')
                        ->with('info','Categoría de video creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  VideoCategory  $video_category
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCategory $video_category)
    {
        return view('admin.video-categories.show', compact('video_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  VideoCategory  $video_category
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoCategory $video_category)
    {
        return view('admin.video-categories.edit', compact('video_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  VideoCategory  $video_category
     * @return \Illuminate\Http\Response
     */
    public function update(VideoCategoryUpdateRequest $request, VideoCategory $video_category)
    {
        $video_category->update($request->all());

        return redirect()->route('video-categories.index')
                        ->with('info','Categoría de video Actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videoCategory = VideoCategory::find($id);
        $message = 'Eliminado la Categoría de recurso; '.$videoCategory->name;
        $videoCategory->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the Expenses posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = VideoCategory::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.video-categories.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
