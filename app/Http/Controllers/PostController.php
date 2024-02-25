<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('dashboard', ['pageTitle' => 'My posts', 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('new-post', ['pageTitle' => 'New post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:50', 'min:3'],
            'post-body' => ['required', 'min:10'],
        ]);

        $title = $request['title'];
        $postBody = $request['post-body'];

        Post::create([
            'title' => $title,
            'post_body' => $postBody,
            'user_id' => Auth::id(),
            'updated_at' => null
        ]);

        return redirect('/new-post')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
