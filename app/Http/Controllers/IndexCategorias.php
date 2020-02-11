<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;

class IndexCategorias extends Controller
{
    public function tecnologia(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::all()->where('categoria_id',3)->random(1)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        // 'ani','cin','tec','vid','ser','com',

        $tecnologia = Post::orderBy('created_at','desc')->where('categoria_id',3)->simplePaginate(1);
        return view('categorias.tecnologia',compact('ani','cin','tec','vid','ser','com','tecnologia'));
    }
    public function cine(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::all()->where('categoria_id',2)->random(1)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $cine = Post::orderBy('created_at','desc')->where('categoria_id',2)->simplePaginate(1);
        return view('categorias.cine',compact('ani','cin','tec','vid','ser','com','cine'));
    }
    public function juegos(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::all()->where('categoria_id',4)->random(1)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $juegos = Post::orderBy('created_at','desc')->where('categoria_id',4)->simplePaginate(1);
        return view('categorias.juegos',compact('ani','cin','tec','vid','ser','com','juegos'));

    }
    public function series(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::all()->where('categoria_id',5)->random(1)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $series = Post::orderBy('created_at','desc')->where('categoria_id',5)->simplePaginate(1);
        return view('categorias.series',compact('ani','cin','tec','vid','ser','com','series'));

    }
    public function anime(){
        $ani = Post::all()->where('categoria_id',1)->random(1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $animes = Post::orderBy('created_at','desc')->where('categoria_id',1)->simplePaginate(1);
        return view('categorias.anime',compact('ani','cin','tec','vid','ser','com','animes'));
    }
    public function comics(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::all()->where('categoria_id',6)->random(1)->first();
        $comics = Post::orderBy('created_at','desc')->where('categoria_id',6)->simplePaginate(1);
        return view('categorias.comics',compact('ani','cin','tec','vid','ser','com','comics'));

    }
    public function reviews(){
        $ani = Post::latest()->where('categoria_id',1)->first();
        $cin = Post::latest()->where('categoria_id',2)->first();
        $tec = Post::latest()->where('categoria_id',3)->first();
        $vid = Post::latest()->where('categoria_id',4)->first();
        $ser = Post::latest()->where('categoria_id',5)->first();
        $com = Post::latest()->where('categoria_id',6)->first();
        $rv = Post::all()->where('categoria_id',7)->random(1)->first();
        $reviews = Post::orderBy('created_at','desc')->where('categoria_id',7)->simplePaginate(5);
        return view('categorias.reviews',compact('ani','cin','tec','vid','ser','com','rv','reviews'));

    }



}
