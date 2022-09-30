<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id)
    {
        $userId = $id;

        $followTable = DB::table('follows')
            ->where('follow_id', Auth::user()->id)
            ->Where('follower_id', $id)
            ->get();

        $profiles = DB::table('users')
            ->where('id', $id)
            ->get();

        $posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('users.id', $id)
            ->orderBy('posts.created_at', 'desc')
            ->groupBy('posts.id')
            ->get();

        $passCount = session()->get('passCount');

        $data = [
            'followTable' => $followTable,
            'userId' => $userId,
            'profiles' => $profiles,
            'posts' => $posts,
            'passCount' => $passCount,
        ];

        return view('users.profile', $data);
    }


    public function profileUpdate(Request $request)
    {
        $image = null;
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('newpass');
        $bio = $request->input('bio');

        if (isset($username)) {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'username' => $username,
                ]);
        }
        if (isset($mail)) {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'mail' => $mail,
                ]);
        }
        if (isset($password)) {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'password' => bcrypt(
                        $password
                    ),
                ]);

            session()->put('passCount', strlen($password));
        }
        if (isset($bio)) {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'bio' => $bio,
                ]);
        }
        if (null !== ($request->file('image'))) {
            $images = $request->file('image');
            $file_name = $request->file('image')->getClientOriginalName();
            $images->storeAs('public/images', $file_name);
            $image = $file_name;

            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'images' => $image,
                ]);
        }
        return redirect('/');
    }


    public function search(Request $request)
    {
        $keyword = null;
        $follows = DB::table('follows')
            ->where('follow_id', Auth::user()->id)
            ->select('follower_id')
            ->get();
        if ($request->isMethod('post')) {
            $keyword = $request->input('search');
            $searchLists = DB::table('users')
                ->select('*', 'users.id as user_id')
                ->where('users.username', 'LIKE', "%{$keyword}%")
                ->Where('id', '<>', Auth::user()->id)
                ->get();
        } else {
            $searchLists = DB::table('users')
                ->select('*', 'id as user_id')
                ->Where('id', '<>', Auth::user()->id)
                ->get();
        }
        return view('users.search', ['searchLists' => $searchLists, 'keyword' => $keyword, 'follows' => $follows]);
    }
}
