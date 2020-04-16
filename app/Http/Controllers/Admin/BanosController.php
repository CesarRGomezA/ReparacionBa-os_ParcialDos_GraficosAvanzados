<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Banos;

class BanosController extends Controller
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
        $bano = Banos::all();
        $argumentos = array();
        $argumentos['banos'] = $bano;
        return view('admin.index',$argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevoBano = new Banos();

        $nuevoBano->id_user = $request->user()->id;
        $nuevoBano->tipo_trabajo = $request->input('tipo_trabajo');
        $nuevoBano->des_problema = $request->input('des_problema');
        $nuevoBano->material = $request->input('material');
        if($request->hasFile('resultado')) {
            $archivoPortada = $request->file('resultado');
            $rutaArchivo = $archivoPortada->store("public/assets/img/resultados");
            $rutaArchivo = substr($rutaArchivo,29);

            $nuevoBano->resultado = $rutaArchivo;
        }
        $nuevoBano->estado = $request->input('estado');
        $nuevoBano->fecha_hora = $request->input('fecha_hora');
        $nuevoBano->lugar = $request->input('lugar');
        if($nuevoBano->save()) {
            //Si pude guardar la noticia
            return redirect()->
                route('admin.index')->
                with('exito',
                'La noticia fue guardada correctamente');
        }
        //Aquí no se pudo guardar
        return redirect()->
            route('admin.index')->
            with('error',
            'No se pudo agregar al noticia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bano = Banos::find($id);
            $argumentos = array();
            $argumentos['trabajos'] = $bano;
            return view('admin.show', $argumentos);
        
              
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bano = Banos::find($id);
        if ($bano) {
            $argumentos = array();
            $argumentos['trabajos'] = $bano;
            return view('admin.edit', $argumentos);
        }
        return redirect()->
                route('admin.inicio')->
                with('error','No se encontró el trabajo');
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
        $bano = Banos::find($id); 
        if ($bano) {
            $bano->tipo_trabajo = $request->input('tipo_trabajo');
            $bano->des_problema = $request->input('des_problema');
            $bano->material = $request->input('material');

            if($request->hasFile('resultado')) {

               

                $archivoPortada = $request->file('resultado');
                $rutaArchivo = $archivoPortada->store('public/assets/img/resultados');
                
                $rutaArchivo = substr($rutaArchivo,29);
        
                $bano->resultado = $rutaArchivo;   
            }
            $bano->estado = $request->input('estado');
            $bano->fecha_hora = $request->input('fecha_hora');
            $bano->lugar = $request->input('lugar');
            
            if ($bano->save()) {
                return redirect()->
                    route('trabajo.edit',$id)->
                    with('exito',
                    'El trabajo se actualizó exitosamente');
            }
            return redirect()->
                route('trabajo.edit',$id)->
                with('error',
                    'No se pudo actualizar el trabajo');
        }
        return redirect()->
            route('trabajo.index')->
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
        $bano = Banos::find($id);
        if ($bano) {
            if($bano->delete()) {
                return redirect()->
                        route('admin.index')->
                        with('exito','Trabajo eliminado exitosamente');
            }
            return redirect()->
                    route('admin.index')->
                    with('error','No se pudo eliminar el trabajo');
        }
        return redirect()->
                route('admin.index')->
                with('error','No se encotró el trabajo');
    }
}
