<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function follow(Request $request)
    {
        Follow::create([
            'follow_id' => Auth::user()->id,
            'follower_id' => $request->input('userId'),
        ]);
        return redirect('/');
    }


    public function unfollow(Request $request)
    {
        $follow = Follow::where('follow_id', Auth::user()->id)
            ->where('follower_id', $request->input('userId'))->first();
        $follow->delete();

        return redirect('/');
    }

    public function followList()
    {
        $userIcons = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follower_id')
            ->where('follows.follow_id', Auth::user()->id)
            ->orderBy('users.created_at', 'desc')
            ->get();

        $posts = DB::table('users')
            ->join('posts',  'users.id', '=', 'posts.user_id')
            ->leftJoin('follows', 'users.id', '=', 'follows.follower_id')
            ->where('follows.follow_id', Auth::user()->id)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('follows.followList', ['userIcons' => $userIcons, 'posts' => $posts]);
    }

    public function followerList()
    {
        $userIcons = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follow_id')
            ->where('follows.follower_id', Auth::user()->id)
            ->orderBy('users.created_at', 'desc')
            ->get();

        $posts = DB::table('users')
            ->join('posts',  'users.id', '=', 'posts.user_id')
            ->leftJoin('follows', 'users.id', '=', 'follows.follow_id')
            ->where('follows.follower_id', Auth::user()->id)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('follows.followerList', ['userIcons' => $userIcons, 'posts' => $posts]);
    }
}
