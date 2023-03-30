<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            // "data" => Post::paginate(5),
            "data" => Post::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return response()->json(['data' => Post::create($request)], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json(['data' => $post], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return response()->json(['data' => $post], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return response()->json(['data' => $post->delete()], 200);
    }
}
