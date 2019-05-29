<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoStoreRequest;
use App\Http\Requests\Admin\VideoUpdateRequest;
use App\Video;
use App\VideoCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the video.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.videos.index');
    }

    /**
     * Show the form for creating a new video.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Video::max('order') + 1;
        $video_categories = VideoCategory::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.videos.create', compact('video_categories','order'));
    }

    /**
     * Store a newly created video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoStoreRequest $request)
    {
        $video = new Video($request->all());
        // $this->authorize('pass', $video);

        //VIDEO
        if($request->file('file')) {
            $file = Input::file('file');

            $file_name = $file->getClientOriginalName();
            $file_path = 'video/upload/';
            $file->move($file_path, $file_name);

            $video->file = asset($file_path . $file_name);
        }

        $video->save();

        return redirect()->route('videos.index')->with('info', 'Video creada con éxito');
    }

    /**
     * Display the specified video.
     *
     * @param  App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified video.
     *
     * @param  App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
         $video_categories = VideoCategory::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.videos.edit', compact('video_categories','video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, Video $video)
    {
        $video->fill($request->all())->save();

        // VIDEO
        if($request->file('file')) {
            $path_doc = Storage::disk('public')->put('video/upload',  $request->file('file'));
            $video->fill(['file' => asset($path_doc)]);
        }

        $video->save();

        return redirect()->route('videos.index')->with('info', 'Video actualizado con éxito');
    }

    /**
     * Remove the specified video from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $message = 'Eliminado el video; '.$video->name;
        $video->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the Expenses resources formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Video::select('id', 'name', 'url', 'status', 'video_category_id','created_at');

        return datatables()
            ->eloquent($query)
            ->editColumn('status', 'admin.videos.datatables.status')
            ->editColumn('url', 'admin.videos.datatables.filename')
            ->editColumn('video_category_id', function(Video $video) {
                return $video->videoCategory['name'];
                })
            ->addColumn('btn', 'admin.videos.partials.actions')
            ->rawColumns(['url','status','btn'])
            ->toJson();
    }
}