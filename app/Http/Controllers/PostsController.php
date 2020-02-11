<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        if (auth()->user()->role_id == 1) {
            $posts = Post::all();
            return view('dashboard.post.lista',compact('posts'));
        } else {
            $posts = Post::all()->where('user_id',$id);
            return view('dashboard.post.lista',compact('posts'));
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('dashboard.post.crear',compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'imagen' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:2048',
            'post' => 'required'

        ],[
            'titulo.required' => 'Por favor complete el campo titulo',
            'categoria.required' => 'Por favor seleccione una categoria',
            'imagen.required' => 'Por favor inserte una imagen',
            'imagen.mimes' => 'El formato ingresado no es soportado estos deben ser: jpeg,jpg,png,gif ',
            'post.required' => 'El campo post no puede estar vacio',
        ]);

        $post = new Post;
        $post->title = $request->titulo;
        $post->post = $request->post;
        // IMAGEN
        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . '.' . $extension;
            $file->storeAs('public/uploads' , $filename);
            $post->imagen = $filename;
        }
        $post->user_id = auth()->user()->id;
        $post->categoria_id = $request->categoria;
        $post->save();
        return redirect('/lista-post')->with('mensaje','Agregado Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorias = Categoria::all();
        return view('dashboard.post.edit',compact('post','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        request()->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'imagen' => 'file|image|mimes:jpeg,jpg,png,gif|max:2048',
            'post' => 'required'

        ],[
            'titulo.required' => 'Por favor complete el campo titulo',
            'categoria.required' => 'Por favor seleccione una categoria',
            'imagen.mimes' => 'El formato ingresado no es soportado estos deben ser: jpeg,jpg,png,gif ',
            'post.required' => 'El campo post no puede estar vacio',
        ]);

        $post->title = $request->titulo;
        $post->post = $request->post;
        // IMAGEN
        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . '.' . $extension;
            $file->storeAs('public/uploads' , $filename);
            $post->imagen = $filename;
        }
        $post->user_id = auth()->user()->id;
        $post->categoria_id = $request->categoria;

        $post->update();
        return redirect('/lista-post')->with('mensaje','Editado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // Storage::delete('uploads/' . $post->imagen);
        $file = $post->imagen;
        unlink('storage/uploads/'.$file);
        $post->delete();
        return redirect('/lista-post')->with('mensaje','Eliminado Correctamente');
    }


}
