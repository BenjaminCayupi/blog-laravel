<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id','ASC')->skip(7)->take(PHP_INT_MAX)->GET();
        return view('dashboard.categoria.listar',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.categoria.crear');

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
            'nombre' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:15'
        ],[
            'nombre.required' => 'Por favor complete el campo',
            'nombre.regex' => 'Este campo solo puede ser completado con letras',
            'nombre.max' => 'Maximo 15 caracteres permitidos'
        ]);
        $cate = new Categoria;
        $cate->name = $request->nombre;
        $cate->user_id = auth()->user()->id;
        $cate->save();
        return redirect('/lista-categoria')->with('mensaje' , 'Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Categoria::findOrFail($id);
        return view('dashboard.categoria.editar',compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:15'
        ],[
            'nombre.required' => 'Por favor complete el campo',
            'nombre.regex' => 'Este campo solo puede ser completado con letras',
            'nombre.max' => 'Maximo 15 caracteres permitidos'
        ]);
        $categorias = Categoria::findOrFail($id);
        $categorias->name = $request->nombre;
        $categorias->user_id = auth()->user()->id;
        $categorias->update();
        return redirect('/lista-categoria')->with('mensaje' , 'Editado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Categoria::findOrFail($id);
        $cate->delete();
        return redirect('lista-categorias')->with('mensaje','Eliminado Correctamente');
    }
}
