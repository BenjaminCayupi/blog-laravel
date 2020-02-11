<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Validation\Rule;


class UserController extends Controller
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
        $usuarios = User::all();
        return view('dashboard.usuarios.listar',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.usuarios.editar',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        request()->validate([
            'nombre' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'correo' => ['required', 'email', Rule::unique('users','email')->ignore($user->id)],
            'rol' => 'required',
        ],[
            'nombre.required' => 'Por favor complete el campoo',
            'nombre.regex' => 'El campo nombre debe solo contener letras',
            'correo.unique' => 'Este correo ya se encuentra registrado',
            'rol.required' => 'Por favor complete el campo'
        ]);
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->role_id = $request->rol;
        $user->update();
        return redirect('/lista-usuarios')->with('mensaje','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return redirect('/lista-usuarios')->with('mensaje','Eliminado Correctamente');

    }
}
