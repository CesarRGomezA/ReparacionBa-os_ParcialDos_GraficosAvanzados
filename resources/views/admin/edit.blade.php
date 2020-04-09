@extends('layouts.admin.inicio')

@section('titulo', 'Administración | Título')
@section('titulo2', 'Texto del título')

@section('estilos')
@endsection

@section('breadcrumbs')
@endsection
<body id="page-top">
@section('contenido')
            <form method="POST" enctype ="multipart/form-data" action="{{route('trabajo.update',$trabajos->id)}}">
                        @csrf
                        @method('PUT')
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Editar Trabajo</h3>
                <div class="card shadow">
                    <div class="form-group">
                            <label>Trabajo</label>
                            <input type="text" 
                                name="tipo_trabajo" value="{{$trabajos->tipo_trabajo}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Descripcion problema </label>
                            <textarea class="form-control" 
                                rows="8" name="des_problema">{{$trabajos->des_problema}}</textarea>
                    </div>
                    <div class="form-group">
                            <label>Material usado para la reparacion</label>
                            <input type="text" 
                                name="material" value="{{$trabajos->material}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Imagen del Resultado</label>
                            <input type="file" name="resultado" class="form-control"/>
                    </div>
                    @if($trabajos->resultado)
                            <a href="/storage/imgPortadas/{{$trabajos->resultado}}" target="_blank">
                            <img style="widht: 50px; height: auto;" src="/storage/imgResultados/{{$trabajos->resultado}}" />
                            </a>
                        @else
                            <p>No hay imagen cargada</p>
                        @endif
                    <div class="form-group">
                            <label>Estado</label>
                            <input type="text" 
                                name="estado" value="{{$trabajos->estado}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Fecha</label>
                            <input type="text" 
                                name="fecha_hora" value="{{$trabajos->fecha_hora}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Lugar</label>
                            <input type="text" 
                                name="lugar" value="{{$trabajos->lugar}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <button type="submit"
                                class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
                
            </div>
            </form>
@endsection
</body>
@section('scripts')
@endsection