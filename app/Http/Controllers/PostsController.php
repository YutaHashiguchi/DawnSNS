<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;



class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = DB::table('users')
            ->select('*', 'posts.id as posts_id', 'posts.created_at as post_create')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->leftJoin('follows', 'users.id', '=', 'follows.follower_id')
            ->Where('posts.user_id', Auth::user()->id)
            ->orWhere('follows.follow_id', Auth::user()->id)
            ->groupBy('posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('posts.index', ['posts' => $posts]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'newPost' => 'string|max:150',
        ]);

        DB::table('posts')->insert([
            'user_id' => $request->input('userId'),
            'posts' => $request->input('newPost')
        ]);

        return redirect('/top');
    }

    public function delete($posts_id)
    {
        DB::table('posts')->where('id', $posts_id)->delete();
        return redirect('/top');
    }
    public function update(Request $request)
    {
        $request->validate([
            'updatePost' => 'string|max:150',
        ]);

        $post_id = $request->input('postId');
        $update = $request->input('updatePost');
        DB::table('posts')->where('id', '=', $post_id)->update(['posts' => $update, 'created_at' => now()]);
        return redirect('/top');
    }
}
