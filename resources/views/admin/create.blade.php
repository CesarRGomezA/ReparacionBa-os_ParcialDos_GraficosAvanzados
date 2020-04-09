@extends('layouts.admin.inicio')

@section('titulo', 'Administración | Título')
@section('titulo2', 'Texto del título')

@section('estilos')
@endsection

@section('breadcrumbs')
@endsection

<body id="page-top">
@section('contenido')
            <form method="POST" enctype ="multipart/form-data" action="{{route('trabajo.store')}}">
                        @csrf
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Nuevo Trabajo</h3>
                
                
                
                <div class="card shadow">
                    <div class="form-group">
                            <label>Trabajo</label>
                            <input type="text" 
                                name="tipo_trabajo" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Descripcion problema </label>
                            <textarea class="form-control" 
                                rows="8" name="des_problema"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Material usado para la reparacion</label>
                            <input type="text" 
                                name="material" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Imagen del Resultado</label>
                            <input type="file" name="resultado" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Estado</label>
                            <input type="text" 
                                name="estado" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Fecha(AÑO, MES, DIA)</label>
                            <input type="text" 
                                name="fecha_hora" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Lugar</label>
                            <input type="text" 
                                name="lugar" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <button type="submit"
                                class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                
            </div>
            </form>
    @endsection
</body>
@section('scripts')
@endsection
