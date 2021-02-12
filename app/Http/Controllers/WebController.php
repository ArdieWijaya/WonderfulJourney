<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function login(){
        $categories = Category::get();

        return view('auth.login', ['categories' => $categories]);
    }

    public function register(){
        $categories = Category::get();

        return view('auth.register', ['categories' => $categories]);
    }

    public function homepage(){
        $categories = Category::all();
        $articles = Article::all();
        $descriptions = array();

        foreach($articles as $article){
            if(strlen($article->description) > 100){
                $description_cut = substr($article->description, 0, 100);
                $description_cut .= '...';

                array_push($descriptions, $description_cut);
            }
        }

        $sizearray = count($descriptions);

        if(!Auth::user()){
            return view('homepage', ['categories' => $categories, 'articles' => $articles, 'descriptions' => $descriptions, 'sizearray' => $sizearray]);
        }

        if(Auth::user()->role == "Admin"){
            return view('admin.homepage');
        }

        if(Auth::user()->role == "User") {
            $name = Auth::user()->name;
            return view('user.homepage', ['name' => $name]);
        }
    }

    public function article($id){
        $article = Article::find($id);
        $categories = Category::all();

        return view('article', ['article' =>$article, 'categories' => $categories]);
    }

    public function category($id){
        $articles = Article::where('category_id', '=', $id)->get();;
        $category = Category::find($id);
        $categories = Category::all();
        $descriptions = array();

        foreach ($articles as $article) {
            if (strlen($article->description) > 100) {
                $description_cut = substr($article->description, 0, 100);
                $description_cut .= '...';

                array_push($descriptions, $description_cut);
            }
        }

        $sizearray = count($descriptions);

        return view('category', ['articles' => $articles, 'categories' => $categories, 'category' =>$category, 'descriptions' => $descriptions, 'sizearray' => $sizearray]);
    }

    public function aboutus(){
        $categories = Category::all();
        return view('aboutus', ['categories' => $categories]);
    }
}
