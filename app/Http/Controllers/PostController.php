<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Bican\Roles\Models\Role;

use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $PostModel)
    {
        $posts = $PostModel -> getPublishedPosts();
        return view('post.index', ['posts' => $posts], compact($posts));
    }

    public function unpublished(Post $PostModel, Role $role){

        $posts = $PostModel -> getUnPublishedPosts();
        return view('post.index', ['posts' => $posts]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $PostModel, PostRequest $request)
    {
        if($request['published'] == null || $request['published'] == ''){
            $request['published'] = false;
        }else{
            $request['published'] = true;
        }
        Post::create([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'excerpt' => $request['excerpt'],
            'content' => $request['content'],
            'published' => $request['published'],
            'published_at' => $request['published_at'],
        ]);

       return redirect()->route('post.index');
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
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, PostRequest $request)
    {
        if($request['published'] == null || $request['published'] == ''){
            $request['published'] = false;
        }else{
            $request['published'] = true;
        }
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return view('post.show', ['post' => $post]);
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

        return redirect()->route('post.index');
    }
}
