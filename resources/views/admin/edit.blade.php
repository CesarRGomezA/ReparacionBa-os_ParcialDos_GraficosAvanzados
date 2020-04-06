<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="/../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/../assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fas fa-dragon"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>LE BAÑOS</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-bath"></i><span>Trabajos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href=""><i class="fas fa-toilet-paper"></i><span>Agregar Trabajo</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Tu</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
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
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © CZAR 2020</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>