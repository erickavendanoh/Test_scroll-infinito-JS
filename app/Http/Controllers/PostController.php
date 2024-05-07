<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::latest()->paginate(10);
        $posts = Post::paginate(10);
        // // $posts = Post::All();
        // // if($request->ajax()){
        // //     $view = view('posts.load', compact('posts'))->render();
        // //     return Response::json(['view'=>$view, 'nextPageUrl'=>$posts->nextPageUrl()]);
        // // }
        return view('posts.index', ['posts'=>$posts]);
    }

    public function pagination(){
        $posts = Post::paginate(10);
        // dd($posts);
        return view('posts.pagination', ['posts'=>$posts]);
    }
}
