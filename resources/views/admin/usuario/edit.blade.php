@extends('layouts.admin.inicio')

@section('titulo', 'Administración | Título')
@section('titulo2', 'Texto del título')

@section('estilos')
@endsection

@section('breadcrumbs')
@endsection
<body id="page-top">
@section('contenido')
            <form method="POST" enctype ="multipart/form-data" action="{{route('usuarios.update',$usuarios->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="container-fluid">
                <h3 class="text-dark mb-4">Nuevo Usuario</h3>
                
                <div class="card shadow">
                    <div class="form-group">
                            <label>Email</label>
                            <input type="text" 
                                name="email" value="{{$usuarios->email}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" 
                                name="name" value="{{$usuarios->name}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Tipo Usuario</label>
                            <input type="text" name="tipo_usuario" value="{{$usuarios->tipo_usuario}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                            <label>Contraseña</label>
                            <input type="text" 
                                name="password" value="{{$usuarios->password}}" class="form-control"/>
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