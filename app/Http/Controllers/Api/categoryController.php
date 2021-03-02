<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\PostsResource;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * @return CategoriesResource
     */
    public function index()
    {
        $categories = Category::paginate();
        return new CategoriesResource($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function posts($id){
        $category = Category::find($id);
        $posts = $category->posts()->paginate();
        return new PostsResource($posts);

    }

    public function comments($id){
        $post = Post::find($id);
        $comments = $post->comments()->paginate();
        return new CommentsResource($comments);
    }
}
