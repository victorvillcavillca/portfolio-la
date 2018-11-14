<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        // die('ppepepe');
        // $posts = Post::orderBy('id', 'DESC')
        //     ->where('user_id', auth()->user()->id)
        //     ->paginate();

        return view('admin.posts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());
        $this->authorize('pass', $post);

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image/upload/posts',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();
        $post       = Post::find($id);
        $this->authorize('pass', $post);

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        $post->fill($request->all())->save();

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image/upload/posts',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Post::find($id);
        // $this->authorize('pass', $post);
        // $post->delete();

        // return back()->with('info', 'Eliminado correctamente');

        $post = Post::find($id);
        $this->authorize('pass', $post);
        $message = 'Eliminado la Publicación; '.$post->name;
        $post->delete();

        return array('message' => $message);
    }

    /**
     * Show a list of all the Expenses posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        // 'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'

// $posts = Post::orderBy('id', 'DESC')
//             ->where('user_id', auth()->user()->id)
//             ->paginate();

        $query = Post::select('id', 'name', 'file', 'status', 'category_id', 'user_id', 'created_at')->where('user_id', auth()->user()->id);

        return datatables()
            ->eloquent($query)
            ->editColumn('status', 'admin.posts.datatables.status')
            ->editColumn('file', 'admin.posts.datatables.file')
            ->editColumn('category_id', function(Post $post) {
                    return $post->category->name;
                })
            ->editColumn('user_id', function(Post $post) {
                    return $post->user->name;
                })
            ->addColumn('btn', 'admin.posts.partials.actions')
            ->rawColumns(['file','status','btn'])
            ->toJson();
    }
}
