<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class IndexController extends Controller
{
    public function postIndex(){
        $post1 = Post::orderBy('created_at','desc')->take(1)->get();
        $post2 = Post::orderBy('created_at','desc')->skip(1)->take(1)->get();
        $post3 = Post::orderBy('created_at','desc')->skip(2)->take(1)->get();
        // $ultpost = Post::orderBy('created_at','desc')->skip(3)->take(PHP_INT_MAX)->get();
        $ultpost = Post::orderBy('created_at','desc')->skip(3)->take(4)->get();
        $review = Post::orderBy('created_at','desc')->where('categoria_id',7)->take(1)->first();
        $reviews = Post::orderBy('created_at','desc')->where('categoria_id',7)->skip(1)->take(5)->get();
        return view('index',compact('post1','post2','post3','ultpost','review','reviews'));
    }

    public function postShow($id)
    {
        $ppost = Post::all()->random(1)->first();
        $random = Post::all()->random()->take(5)->get();
        $post = Post::findOrFail($id);
        return view('post',compact('post','ppost','random'));
    }

    public function todosLosPost(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $posts = Post::orderBy('created_at','desc')->simplePaginate(6);
        return view('todpost',compact('ani','cin','tec','vid','ser','com','posts'));
    }

    public function todosLasReview(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $reviews = Post::orderBy('created_at','desc')->where('categoria_id',7)->simplePaginate(6);
        return view('todpost',compact('ani','cin','tec','vid','ser','com','posts'));
    }

}
