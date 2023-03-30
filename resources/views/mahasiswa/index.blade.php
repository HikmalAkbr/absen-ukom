@extends('layouts.template')       
        <!-- START DATA -->
               
        @section('konten')

        {{-- @can('isUser')
        <h6>Anda punya akses sebagai user</h6>
        @elsecan('isAdmin')
        <h3>Anda punya akses sebagai admin</h3>
         @else
        <h3>Anda punya akses sebagai Author</h3>
         @endcan --}}
        <html>
            <title>Absen MHS</title>
            
            <head><h1 class="m-0">Absensi</h1></head>
        </html>
          
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <a href='{{ route('mahasiswa.create') }}' class="btn btn-primary">+ Tambah Data</a>
               
                <div class="pb-3">
                  
                </div>
              
                <table class="table table-striped">
                 
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-4">Jurusan</th>
                            <th class="col-md-3">Waktu Absen</th>
                            <th class="col-md-3">Status</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // dd($absen);
                        ?>
                         @foreach ($absen as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            {{-- <td>{{ $i }}</td> --}}
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->jurusan}}</td>
                            <td>{{ $item->created_at}}</td>
                            
                            <td>{{ $item->status}}</td>
                            <td>
                                {{-- <form class='d-inline'>
                                <a href='{{ url('mahasiswa/'.$item->id_absen.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                              </form>   --}}
                              <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('mahasiswa/'.$item->id_absen) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>                                 
                            </td>
                        </tr>
                     
                        @endforeach
                        
                    </tbody>
                </table>
               {{-- {{ $mhs->withQueryString()->links() }}  --}}
          </div>
          <!-- AKHIR DATA -->
          @endsection
    