@extends('layouts.admin.inicio')

@section('titulo', 'Administración | Título')
@section('titulo2', 'Texto del título')

@section('estilos')
@endsection

@section('breadcrumbs')
@endsection


<body>
@section('contenido')
            <div class="container-fluid">
                <h3 class="text-dark mb-4">TRABAJOS</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Tabla</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-3"> 
                                <form>
                                    <div class="form-group">
                                        <label>
                                        <input  class="form-control" id="txtCriterio" type="search" name="criterio" aria-controls="dataTable" placeholder="Estado">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                </form>
                                </div>
                                <div class="col-md-3"> 
                                <form>
                                    <div class="form-group">
                                        <label>
                                        <input  class="form-control" id="txtFecha" type="search" name="fecha" aria-controls="dataTable" placeholder="Fecha">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                </form>
                                </div>
                                <div class="col-md-3"> 
                                <form>
                                    <div class="form-group">
                                        <label>
                                        <input  class="form-control" id="txtTarea" type="search" name="tarea" aria-controls="dataTable" placeholder="Tipo de tarea">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                </form>
                                </div>
                                
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Tipo Trabajo</th>
                                        <th>Problema</th>
                                        <th>Material</th>
                                        <th>Estado</th>
                                        <th>Fecha y Hora</th>
                                        <th>Lugar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($banos as $bano)
                                    <tr>
                                        <td>{{$bano->tipo_trabajo}}</td>
                                        <td>{{$bano->des_problema}}</td>
                                        <td>{{$bano->material}}</td>
                                        <td>{{$bano->estado}}<br></td>
                                        <td>{{$bano->fecha_hora}}</td>
                                        <td>{{$bano->lugar}}</td>
                                        <td>
                                        <!-- Show -->
                                        <a href="{{ route('trabajo.show', $bano -> id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                         <!-- Edit -->
                                         <a href="{{ route('trabajo.edit', $bano -> id) }}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete -->
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $bano -> id  }})" data-target="#delete-modal" class="btn btn-danger delete-modal-btn">
                                            <i class="fas fa-times"></i>
                                        </a>
                                            
                                        
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Tipo Trabajo</strong></td>
                                        <td><strong>Problema</strong></td>
                                        <td><strong>Material</strong></td>
                                        <td><strong>Estado</strong></td>
                                        <td><strong>Fecha y Hora</strong></td>
                                        <td><strong>Lugar</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <form method="POST" id="deleteForm" action="{{route('trabajo.destroy', $bano -> id)}}">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">¿Seguro de que deseas borrar el registro?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Discard
                                </button>

                                <button type="submit" class="btn btn-primary" name="delete_noticia" onclick="formSubmit()">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


@endsection
</body>
@section('scripts')
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("trabajo.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
        $("#modal-body").innerHTML("En caso de borrar la noticia no habrá manera de recuperarla.")
    }
</script>
@endsection