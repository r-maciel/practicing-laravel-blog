<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

/* Exportando nuestro FormRequest*/
use App\Http\Requests\RequestPost;

class PostController extends Controller
{
    public function __construct()
    {
        //To use this controller you need to be authenticated, except to see the post
        $this->middleware('auth')->except('show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Bring all categories and sort them by category name*/
        $categories = Category::all()->sortBy('category');
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* Insted of using the normal request you can use the Form Request you created, this is a customized request*/
    public function store(RequestPost $request)
    {
        /*Validating data, instead of using the validate() you use validated(), the dat is validated with the rules you define in your FormRequest*/
        $data = $request->validated();

        //We use the method posts()that define our relationship to create the post for the user
        $post = auth()->user()->posts()->create($data);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        /* We don't use with() to eager load the user because we already load our post with route model binding, eager load is use ONLY when you need to bring your parent model and you child model, both of them inthis case posts and users, but we already have post so we can use lazy eager loading with load() to load the realated models without making a lot of querys
        $post->with('user')->get();*/

        /*NOTE: If you try to bring the user and category with $post->user and later $post->category, your gonna be making and extra query, maybe for this example is not to clear because we are loading only one post, so add the end of the day is gonna make 3 querys, one for the post, one for the user and one for the category, but if you try to bring all posts or all users or categories your gonna be in a n+1 problem because you're gonna need to run more than just 3 querys, so with eager load your gonna make the ONLY necessary querys*/
        $post->load('user', 'category');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('updateDelete', $post);
        $data['post'] = $post->load('category');
        $data['categories'] = Category::orderBy('category')->get();
        return view('posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(RequestPost $request, Post $post)
    {
        $this->authorize('updateDelete', $post);
        $data = $request->validated();
        $post->update($data);

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('updateDelete', $post);
        $post->delete();

        return redirect()->route('users.index', ['user' => auth()->user()->alias]);
    }
}
