<?php

namespace App\Http\Controllers;

use App\Banos;
use Illuminate\Http\Request;

class BanosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banos = Banos::all();

        return $banos;
    }

    public function search(Request $request)
    {
        // Search terms
        $filter = $request -> input('filtro');
        $search = $request -> input('fecha');

        // Retrieval of the data according to the search terms
        if($filter == "pendientes" || $filter == "Pendientes" || $filter == "pendiente" || $filter == "Pendiente")
        {
            $instalaciones = Instalacion::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Pendiente'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        }
        else if($filter == "terminadas" || $filter == "Terminadas" || $filter == "terminado" || $filter == "Terminado")
        {
            $instalaciones = Instalacion::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Terminado'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        } else 
        {
            return "No se encontró ningun registro";
        }
        
        // Construcción del JSON de respuesta
        $respuesta = array();
        $respuesta['instalaciones'] = $instalaciones;
        
        return $respuesta;
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
        $nuevoBano->id_user = $request->input('id_user');
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
        
        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($nuevoBano -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find primary key
        $banos = Banos::find($id);

        if($banos){

            $respuesta = array();
            $respuesta['Trabajo'] = $banos;
        } 
        else 
            $respuesta['Trabajo']= "No se encontro la reparacion";

        return $respuesta;
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
        $Bano = Banos::find($id);
        $Bano->id_user = $request->input('id_user');
        $Bano->tipo_trabajo = $request->input('tipo_trabajo');
        $Bano->des_problema = $request->input('des_problema');
        $Bano->material = $request->input('material');
        if($request->hasFile('resultado')) {
            $archivoPortada = $request->file('resultado');
            $rutaArchivo = $archivoPortada->store("public/assets/img/resultados");
            $rutaArchivo = substr($rutaArchivo,29);

            $Bano->resultado = $rutaArchivo;
        }
        $Bano->estado = $request->input('estado');
        $Bano->fecha_hora = $request->input('fecha_hora');
        $Bano->lugar = $request->input('lugar');
        
        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($Bano -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
