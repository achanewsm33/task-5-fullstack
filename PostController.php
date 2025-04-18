<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'List of posts',
            'data' => Post::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $post = Post::create($validated);
    
        return response()->json([
            'message' => 'Post berhasil dibuat!',
            'data' => $post
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
