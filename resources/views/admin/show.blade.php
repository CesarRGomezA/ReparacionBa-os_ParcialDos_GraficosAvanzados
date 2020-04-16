@extends('layouts.admin.inicio')

@section('titulo', 'Administración | Título')
@section('titulo2', 'Texto del título')

@section('estilos')
@endsection

@section('breadcrumbs')
@endsection

<body id="page-top">
@section('contenido')
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Team</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Employee Info</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
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
                                  
                                    <tr>
                                        <td>{{$trabajos->tipo_trabajo}}</td>
                                        <td>{{$trabajos->des_problema}}</td>
                                        <td>{{$trabajos->material}}</td>
                                        <td>{{$trabajos->estado}}<br></td>
                                        <td>{{$trabajos->fecha_hora}}</td>
                                        <td>{{$trabajos->lugar}}</td>
                                    </tr>
                                
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
                            <label>Resultado del trabajo</label>
                            <br>
                            <img src="/storage/assets/img/resultados/{{$trabajos->resultado}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

@endsection
</body>
@section('scripts')
@endsection
