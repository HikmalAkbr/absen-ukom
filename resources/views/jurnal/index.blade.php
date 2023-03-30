@extends('layouts.template')       
        <!-- START DATA -->
               
        @section('konten')
        <html>
            <title>Jurnal</title>
            <head><h1 class="m-0">Jurnal</h1></head>
        </html>
          
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <a href='{{ route('jurnal.create') }}' class="btn btn-primary">+ Tambah Data</a>
               
                <div class="pb-3">
                  
                </div>
              
                <table class="table table-striped">
                 
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Tanggal Jurnal</th>
                            <th class="col-md-10">Jurnal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // dd($absen);
                        ?>
                         @foreach ($jurnal as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            {{-- <td>{{ $i }}</td> --}}
                            <td>{{ $item->jam_input}}</td>
                            <td>{{ $item->jurnal}}</td>
                            <td><form class='d-inline'>
                                <a href='{{ url('jurnal/'.$item->id_jurnal.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                              </form>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('jurnal/'.$item->id_jurnal) }}" method="post">
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
    