<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin 2 - Blank</title>

    <link rel="icon" type="image/png" href="{{asset('img/title.png')}}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a href="/home">
                <li class="nav-item">

                    <img width="90%" height="90%" src="{{asset('img/dango.png')}}">

                </li>
            </a>

            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Pages Collapse Menu -->

            @if (auth()->user()->nivel==1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('adm.asignaciones.listar')}}" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-signature"></i>
                    <span>Asignaciones</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('adm.asignaciones.listar')}}">Listar</a>
                        <a class="collapse-item" href="{{route('adm.asignaciones.crear')}}">Crear</a>
                    </div>
                </div>
            </li>





            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('adm.controles.listar')}}" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-tasks"></i>
                    <span>Controles</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('adm.controles.listar')}}">Listar</a>
                        <a class="collapse-item" href="{{route('adm.controles.crear')}}">Crear</a>
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('adm.areas.listar')}}" data-toggle="collapse"
                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Áreas</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('adm.areas.listar')}}">Listar</a>
                        <a class="collapse-item" href="{{route('adm.areas.crear')}}">Crear</a>
                    </div>
                </div>
            </li>




            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('adm.depositos.listar')}}" data-toggle="collapse"
                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-warehouse"></i>
                    <span>Depósitos</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('adm.depositos.listar')}}">Listar</a>
                        <a class="collapse-item" href="{{route('adm.depositos.crear')}}">Crear</a>
                    </div>
                </div>
            </li>




            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('adm.usuarios.listar')}}" data-toggle="collapse"
                    data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                    <i class="fas fa-user"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('adm.usuarios.listar')}}">Listar</a>
                        <a class="collapse-item" href="{{route('adm.usuarios.crear')}}">Crear</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('adm.datos.menu')}}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Datos</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->nivel==2)


            <li class="nav-item">
                <a class="nav-link" href="{{route('usr.asignaciones.listar')}}">
                    <i class="fas fa-file-signature"></i>
                    <span>Autoevaluaciones</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('usr.responsables.listar')}}" data-toggle="collapse"
                    data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                    <i class="fas fa-user"></i>
                    <span>Responsables</span>
                </a>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('usr.responsables.listar')}}">Listar</a>
                        <a class="collapse-item" href="{{route('usr.responsables.crear')}}">Crear</a>
                    </div>
                </div>
            </li>

            @endif
            <hr class="sidebar-divider">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('perfil.mostrar')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dango 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('sweetalert::alert')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    @yield('scripts')

</body>

</html>