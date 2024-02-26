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
    public function index(Request $request)
    {
        $postsOnPage = 10;

        if(isset($request['page']) && !is_numeric($request['page'])){
            return redirect("/dashboard?page=1");
        }

        if(isset($request['page']) && $request['page'] <= 0){
            return redirect("/dashboard?page=1");
        }

        if(isset($request['page']) && !ctype_digit($request['page'])){
            $pageToRedirect = floor($request['page']);
            return redirect("/dashboard?page=$pageToRedirect");
        }

        $posts = DB::table('posts')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate($postsOnPage);
        $total = $posts->total();
        $maxPage = ceil($total/$postsOnPage);

        if($request['page'] > $maxPage && $total > 0){
            return redirect("/dashboard?page=$maxPage");
        }

        return view('dashboard', ['pageTitle' => 'My posts', 'posts' => $posts, 'maxPage' => $maxPage]);
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
        DB::table('posts')->where('user_id', '=', Auth::user()->id)->delete($id);

        return redirect(url()->full())->with('deleted', true);
    }

    public function show10()
    {
        $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name')->orderBy('created_at', 'desc')->take(10)->get();

        return view('welcome', ['posts' => $posts]);
    }
    
}
