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
                    <div class="form-group">
                    <label>
                        Tipo de Usuario
                    </label>

                    <select name="tipo_usuario" class="form-control" data-toggle="dropdown" aria-expanded="false">
                        <option value="{{ $usuarios -> tipo_usuario }}" class="dropdown-item" role="presentation">{{ $usuarios -> tipo_usuario }}</option>

                        @if($usuarios->tipo_usuario == "Administrador")
                        <option value="Usuario" class="dropdown-item" role="presentation">Usuario</option>
                        @else
                        <option value="Administrador" class="dropdown-item" role="presentation">Administrador</option>
                        @endif

                    </select>
                </div>
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