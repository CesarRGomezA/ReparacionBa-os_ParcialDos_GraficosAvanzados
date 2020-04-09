<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Usuario;

class UsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        $argumentos = array();
        $argumentos['usuarios'] = $usuario;
        return view('admin.usuario.index',$argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevoUsuario = new Usuario();
        $nuevoUsuario->name = $request->input('name');
        $nuevoUsuario->email = $request->input('email');
        $nuevoUsuario->password = $request->input('password');
        $nuevoUsuario->tipo_usuario= $request->input('tipo_usuario');
        if($nuevoUsuario->save()) {
            //Si pude guardar la noticia
            return redirect()->
                route('usuarios.index')->
                with('exito',
                'El usuario se agrego');
        }
        //Aquí no se pudo guardar
        return redirect()->
            route('usuarios.index')->
            with('error',
            'No se agreo el usuario F');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
            $argumentos = array();
            $argumentos['usuarios'] = $usuario;
            return view('admin.usuario.show', $argumentos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $argumentos = array();
            $argumentos['usuarios'] = $usuario;
            return view('admin.usuario.edit', $argumentos);
        }
        return redirect()->
                route('usuario.index')->
                with('error','No se encontró el usuario');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id); 
        if ($usuario) {
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->password = $request->input('password');
            $usuario->tipo_usuario= $request->input('tipo_usuario');
            
            if ($usuario->save()) {
                return redirect()->
                    route('usuarios.edit',$id)->
                    with('exito',
                    'El trabajo se actualizó exitosamente');
            }
            return redirect()->
                route('usuarios.edit',$id)->
                with('error',
                    'No se pudo actualizar el trabajo');
        }
        return redirect()->
            route('usuarios.index')->
            with('error',
                'No se encontró la noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            if($usuario->delete()) {
                return redirect()->
                        route('usuarios.index')->
                        with('exito','Usuario eliminado exitosamente');
            }
            return redirect()->
                    route('usuarios.index')->
                    with('error','No se pudo eliminar el usuario');
        }
        return redirect()->
                route('usuarios.index')->
                with('error','No se encotró al usuarioo');
    }
}
