<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $username, Request $request){ // todo: megnézni hogy postcontroller index methoddal és ezzel lehet e valamit közösen kezdeni
        try{
            $postsOnPage = 10;

            if(isset($request['page']) && !is_numeric($request['page'])){
                return redirect("/user/$username?page=1");
            }
    
            if(isset($request['page']) && $request['page'] <= 0){
                return redirect("/user/$username?page=1");
            }
    
            if(isset($request['page']) && !ctype_digit($request['page'])){
                $pageToRedirect = floor($request['page']);
                return redirect("/user/$username?page=$pageToRedirect");
            }
    
            $posts = DB::table('posts')
            ->when(isset($request['date']) && $request['date'] != "", function ($querry) use ($request){
                return $querry->whereDate('posts.created_at', '=', date_create($request['date'])->format('Y-m-d'));
            })
            ->where([
                ['title', 'REGEXP', $request['post-title']],
                ['post_body', 'REGEXP', $request['post-body']],
                ])
            ->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name')
            ->where('users.name', 'REGEXP', $username) // postcontroller difi
            ->orderBy('created_at', 'desc')
            ->paginate($postsOnPage);

            $total = $posts->total();
            $maxPage = ceil($total/$postsOnPage);

            if($request['page'] > $maxPage && $total > 0){
                return redirect("/user/$username?page=$maxPage");
            }
    
            return view('profile', ['pageTitle' => $username, 'posts' => $posts, 'maxPage' => $maxPage]);
        }catch(\Exception $err){
            return abort(500, 'Internal error.');
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
