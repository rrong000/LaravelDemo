<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index', ['posts' => Post::cursor()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null(Auth::user())) {

            return redirect(route('login'));
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);
        $post = new Post;
        $post->content = $request->input('content');
        $post->subject_id = 0;
        $post->user_id = Auth::id();
        $post->title = $request->input('title');

        $post->save();
        return redirect(route('posts.index', ['post' => $post]))->with('notice','文章新增成功!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)

{

    $user = Auth::user();

    if(is_null($user) || $user->cant('update', $post)){
        echo "<script> alert('抱歉!你不能編輯其他使用者的文章');parent.location.href='http://localhost:85/LaravelDemo/public/posts';</script>";


    }
    return view('posts.edit', ['post' => $post]);

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->content = $request->input('content');
        $post->save();
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);
        $post->update($content);
        return redirect(route('posts.index', ['post' => $post]))->with('notice','文章更新成功!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $user = Auth::user();

        if(is_null($user) || $user->cant('update', $post)){
            echo "<script> alert('抱歉!你不能刪除其他使用者的文章');parent.location.href='http://localhost:85/LaravelDemo/public/posts';</script>";
            return view('posts.index', ['post' => $post]);

        }
        else{
                $post->delete();
                return redirect(route('posts.index', ['post' => $post]))->with('notice','文章刪除成功!');
        }





    }
}
