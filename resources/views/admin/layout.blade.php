<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
</head>
<body>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/dist/css/AdminLTE.min.css')}}">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light"><b>SINOVATIF</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Sistem Magang</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          {{-- <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              <b>INI PAJANGAN</b>
              <i class="right fas fa-angle-left"></i>
            </p>
          </a> --}}
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('logout') }}" method="POST" class="nav-link active">
                <!-- <i class="far fa-circle nav-icon"></i> -->
                <p>logout</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mahasiswa.index')}}" class="nav-link">
                <p>Mahasiswa 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mahasiswa2.index')}}" class="nav-link">
                <p>Mahasiswa 2</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ route('jurnal.index')}}" class="nav-link">
                <p>Jurnal MHS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('upload')}}" class="nav-link">
                <p>file gambar</p>
              </a>
            </li> --}}
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Simple Link
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- <title>Data Mahasiswa</title> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light">
<main class="container">
  @include('komponen.pesan')
    @yield('konten')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html><meta charset="utf-8">
