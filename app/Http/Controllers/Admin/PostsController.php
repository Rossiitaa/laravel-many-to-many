<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostsController extends Controller
{

    protected $validationRules = [
        'title' => 'required|string|max:255|min:3',
        'content' => 'required|string',
        'category_id' => 'required|integer',
        'tags' => 'required|exists:tags,id',
        'image' => 'image|max:255|mimes:jpeg,jpg,png',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentData = $request->validate($this->validationRules);

        $sentData = $request->all();
        $newPost = new Post;
        $sentData['user_id'] = Auth::id();
        $sentData['date'] = new DateTime();

        $sentData['image'] = Storage::put('uploads', $sentData['image']);

        $newPost->fill($sentData);
        $newPost->save();
        $newPost->tags()->sync($sentData['tags']);

        return redirect()->route('admin.posts.index')->with('message', '"'.$sentData['title'].'" has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
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
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $sentData = $request->validate($this->validationRules);
        $sentData = $request->all();

        $newPost = Post::findOrFail($id);
        $sentData['image'] = Storage::put('uploads', $sentData['image']);

        $newPost->update($sentData);
        $newPost->tags()->sync($sentData['tags']);

        return redirect()->route('admin.posts.index')->with('message', '"'.$sentData['title'].'" has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', '"'.$post->title.'" has been deleted');
    }
}
