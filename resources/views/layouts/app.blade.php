<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>U-HeloBoard</title>
    <link rel="icon" href="{{ asset ('img/logo_unicase.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset ('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset ('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset ('plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('plugins/jquery-ui/jquery-ui.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset ('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">


    <link rel="stylesheet" href="{{ asset ('css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset ('css/custom_css/signature.css') }}">


    <!-- Tambahan baru -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />

    @yield('css')
    <style>
    body {
        font-size: 12px;
    }

    .form-control {
        font-size: 12px;
    }

    input,
    select,
    textarea {
        color: #6c757d !important;
    }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <li class="nav-item dropdown">
                <a class="nav-link pr-5" data-toggle="dropdown" href="#">
                    {{Auth::user()->name}} <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mr-5"
                    style="padding-top: 0px;padding-bottom: 0px;">
                    <a href="{{ url ('/logout') }}" class="dropdown-item" style="padding-top:6px;padding-bottom:8px;">
                        <span class="text-danger"><b><i class="nav-icon fas fa-sign-out-alt"
                                    style="margin-right: 10px; "></i>Log Out</b></span>
                    </a>
                </div>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
        <!-- Brand Logo -->
        <a class="brand-link ">
            <img src="{{ asset ('img/logo_unicase.png') }} " alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <!-- <span class="brand-text font-weight-light">MyApps</span> -->
            <span class="brand-text font-weight-light">
                <h5>U-HeloBoard</h5>
            </span>
            <!--<span class="brand-text font-weight-light">-->
            <!--    <h1>U-HeloBoard</h1>-->
            <!--    <img src="{{ asset ('img/text_unicase.png') }} " width="40%">-->
            <!--</span>-->
        </a>


        <div class="sidebar ">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @can('superadmin')
                    <li class="nav-item">
                        <a href="{{route('dashboard.index')}}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ route ('buat_surat.index') }}" class="nav-link ">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Buat Surat
                            </p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="{{ route('surat_masuk.index') }}" class="nav-link ">
                            <i class="nav-icon fas fa-envelope-open"></i>
                            <p>
                                Surat Masuk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('surat_keluar.index') }}" class="nav-link ">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Surat Keluar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Buku Tamu
                                <i class="fas fa-angle-down right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left:1rem;">
                            <li class="nav-item">
                                <a href="{{ route ('form_tamu.index')}}" class="nav-link">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>Form Buku Tamu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route ('tamu.index') }}" class="nav-link">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>Data Tamu</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('spk.index') }}" class="nav-link ">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Data Perintah Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('data_perjalanan_dinas.index') }}" class="nav-link ">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Data Perjalanan Dinas
                            </p>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Data Pengajuan Dana
                                <i class="fas fa-angle-down right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left:1rem;">
                            <li class="nav-item">
                                <a href="{{ route ('daftar_pengajuan_dana.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>Daftar Pengajuan Dana</p>
                                </a>
                            </li>
                            @canany(['superadmin' , 'approval_1_pengajuan_dana'])
                            <li class="nav-item">
                                <a href="{{ route ('approval_1_pengajuan_dana.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-signature"></i>
                                    <p>Approval Divisi</p>
                                </a>
                            </li>
                            @endcanany
                            @canany(['superadmin' , 'approval_2_pengajuan_dana'])
                            <li class="nav-item">
                                <a href="{{ route ('approval_2_pengajuan_dana.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-signature"></i>
                                    <p>Approval Finance</p>
                                </a>
                            </li>
                            @endcanany
                            @canany(['superadmin' , 'proses_pengajuan_dana'])
                            <li class="nav-item">
                                <a href="{{ route ('proses_pengajuan_dana.index') }}" class="nav-link">
                                    <i class="fas fa-receipt nav-icon"></i>
                                    <p>Proses Pengajuan Dana</p>
                                </a>
                            </li>
                            @endcanany
                            @canany(['superadmin' , 'validasi_pengajuan_dana'])
                            <li class="nav-item">
                                <a href="{{ route ('validasi_pengajuan_dana.index') }}" class="nav-link">
                                    <i class="fas fa-check-double nav-icon"></i>
                                    <p>Validasi Pengajuan Dana</p>
                                </a>
                            </li>
                            @endcanany

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Pengajuan
                                <i class="fas fa-angle-down right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left:1rem;">
                            <li class="nav-item">
                                <a href="{{ route('pengajuan_dana.index') }}" class="nav-link">
                                    <i class="fas fa-money-check-alt nav-icon"></i>
                                    <p>Pengajuan Dana</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('perjalanan_dinas.index') }}" class="nav-link">
                                    <i class="fas fa-briefcase nav-icon"></i>
                                    <p>Perjalanan Dinas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fk_ga.index') }}" class="nav-link">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>Kerja GA</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @can('superadmin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-toolbox"></i>
                            <p>
                                Administrasi Sistem
                                <i class="fas fa-angle-down right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left:1rem;">
                            <li class="nav-item">
                                <a href="{{route('karyawan.index')}}" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Data Karyawan</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-sitemap nav-icon"></i>
                                    <p>Data Organisasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-list-ol nav-icon"></i>
                                    <p>Data Status Pengajuan Dana</p>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-down right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left:1rem;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Laporan Surat Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Laporan Surat Keluar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Laporan Buku Tamu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Laporan Pengajuan FPK</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Laporan Pengajuan Dana</p>
                                </a>
                            </li>

                        </ul>
                    </li> -->
                    @endcan



                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="content-wrapper">
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('flash-message')
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center layout-footer-fixed">
        <strong>Copyright &copy; 2022 <a href="">CV. Unitech Indonesia</a>.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </script>
    <!-- ./Script Baru -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->
    <script type="text/javascript" src="{{ asset('js/plugin_js/aspnetcdn.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <!-- jQuery UI 1.11.4 -->
    <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script type="text/javascript" src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->

    <script type="text/javascript" src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>



    <!-- JQVMap -->

    <script type="text/javascript" src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script type="text/javascript"
        src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script type="text/javascript" src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
    </script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="{{ asset('js/adminlte.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script type="text/javascript" src="{{ asset('js/demo.js') }}"></script>

    <!-- <script type="text/javascript" src="{{ asset('js/my_js/my_js.js') }}"></script> -->

    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugin_js/jspdf.js') }}"></script>

    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>


    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @yield('javascript')

    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>

</html>