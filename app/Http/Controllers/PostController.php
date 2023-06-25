<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Tables\Posts;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view(
            'posts.index',
            [
                'posts' => Posts::class
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->toArray();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        //
        Post::create($request->validated());
        Toast::title('Post created successfully')->leftBottom()->autoDismiss(10);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::pluck('name', 'id')->toArray();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, Post $post)
    {
        //
        $post->update($request->validated());
        Toast::title('Post updated successfully')->centerTop()->autoDismiss(8);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        Toast::title('Post deleted successfully')->centerTop()->autoDismiss(8);
        return redirect()->route('posts.index');
    }
}
