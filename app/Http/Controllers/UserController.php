<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile_get(){

        return view('user.profile');
    }

    public function profile_post(Request $request){

        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits_between:10, 13']
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('homepage');
    }

    public function blog(){
        $blogs = Article::where('user_id', '=', Auth::user()->id)->get();

        return view('user.blog', ['blogs' => $blogs]);
    }

    public function delete($id){
        DB::delete('DELETE FROM articles WHERE id = ?', [$id]);
        $blogs = Article::where('user_id', '=', Auth::user()->id)->get();

        return view('user.blog', ['blogs' => $blogs]);
    }

    public function blogcreate(){
        $categories = Category::all();

        return view('user.createblog', ['categories' => $categories]);
    }

    public function blogcreatepost(Request $request){
        $categories = Category::all();
        $blogs = Article::where('user_id', '=', Auth::user()->id)->get();

        $request->file('image')->storeAs('/public', $request->image);
        $url = Storage::url($request->image);

        $article = new Article([
            'title' => $request->title,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'image' => $url,
            'description' => $request->description,
        ]);
        
        $article->save();

        return view('user.blog',['categories' => $categories, 'blogs' => $blogs]);
    }
}
