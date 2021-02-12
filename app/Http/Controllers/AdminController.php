<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function user(){
        $users = User::where('role', '=', 'User')->get();

        return view('admin.user', ['users' => $users]);
    }

    public function userpost($id){
        $user = User::find($id);
        $blogs = Article::where('user_id', '=', $user->id)->get();

        return view('admin.userpost', ['user' => $user, 'blogs' => $blogs]);
    }

    public function userpostdelete($uid, $pid){
        DB::delete('DELETE FROM articles WHERE id = ?', [$pid]);
        $user = User::find($uid);
        $blogs = Article::where('user_id', '=', $user->id)->get();

        return view('admin.userpost', ['user' => $user, 'blogs' => $blogs]);
    }

    public function userdelete($id){
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        $users = User::where('role', '=', 'User')->get();

        return view('admin.user', ['users' => $users]);
    }
}
