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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

{{-- @extends('layouts.template')        --}}
        <!-- START DATA -->
               
        @section('konten')
            
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                {{-- <div class="pb-3">
                  <form class="d-flex" action="{{ route('admin.index') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div> --}}
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <?php
                  // dd( route('admin.create') );
                  ?>
                  <a href='{{ route('admin.create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-4">Jurusan</th>
                            <th class="col-md-4">Periode Magang</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Password</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{-- {{dd($mahasiswa)}} --}}
                       @foreach($mahasiswa as $item)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->jurusan}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->password}}</td>
                            <td><form class='d-inline'>
                              <a href='{{ url('admin/'.$item->id_mahasiswa.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                            </form>
                              <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('admin/'.$item->id_mahasiswa) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                              </form>                                 
                          </td>
                        </tr>
                       
                        @endforeach
                        
                    </tbody>
                </table>
               {{-- {{ $datas->withQueryString()->links() }} --}}
          </div>
          <!-- AKHIR DATA -->
          @endsection
    
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
    