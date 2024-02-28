<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
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
        }catch(\Exception $err){
            return abort(500, 'Internal error.');
        }

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

        try{
            $title = $request['title'];
            $postBody = $request['post-body'];
    
            $response = Post::create([
                'title' => $title,
                'post_body' => $postBody,
                'user_id' => Auth::id(),
                'updated_at' => null
            ]);

            return redirect("/post/$response->post_id")->with('created', true);
        }catch(\Exception $err){
            return abort(500, 'Internal error.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $post = DB::table('posts')->where('id', $id)->get();

            if($post->count() == 1){
                return view('singlePost', ['pageTitle' => $post[0]->title, 'posts' => $post]);
            }else if($post){
                return redirect('/dashboard')->with('error', 'Post not found.');;
            }

        }catch(\Exception $err){
            //Log::error('Error updating post: ' . $err->getMessage());
            return abort(500, 'Internal error.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $post = DB::table('posts')->where('user_id', '=', Auth::user()->id)->where('id', $id)->first();

            if($post){
                return view("edit-post", ['pageTitle' => 'Edit post', 'post' => $post]);
            }else{
                return redirect('/dashboard')->with('error', 'Post not found or you do not have permission to update it.');;
            }

        }catch(\Exception $err){
            //Log::error('Error updating post: ' . $err->getMessage());
            return abort(500, 'Internal error.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:50', 'min:3'],
            'post-body' => ['required', 'min:10'],
        ]);

        try{

            $result = DB::table('posts')->where('user_id', '=', Auth::user()->id)->where('id', $id)->update(['title' => $request['title'], 'post_body' => $request['post-body'], 'updated_at' => now()->toDateTimeString()]);

            if($result){
                return redirect("/post/$id")->with('updated', true);
            }else{
                return redirect("/post/$id")->with('updated', false)->with('error', 'Post not found or you do not have permission to update it.');
            }

        }catch(\Exception $err){
            //Log::error('Error updating post: ' . $err->getMessage());
            return abort(500, 'Internal error.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try{
            $result = DB::table('posts')->where('user_id', '=', Auth::user()->id)->delete($id);

            if($result){
                return redirect('/dashboard')->with('deleted', true);
            }else{
                return redirect('/dashboard')->with('deleted', false)->with('error', 'Post not found or you do not have permission to delete it.');;
            }

        }catch(\Exception $err){
            //Log::error('Error updating post: ' . $err->getMessage());
            return abort(500, 'Internal error.');
        }
    }

    public function show10()
    {
        try{
            $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name')->orderBy('created_at', 'desc')->take(10)->get();

            return view('welcome', ['posts' => $posts]);
        }catch(\Exception $err){
            return abort(500, 'Internal error.');
        }
    }
    
}
