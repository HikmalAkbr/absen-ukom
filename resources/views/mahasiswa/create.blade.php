@extends('layouts.template')
<!-- START FORM -->
@section('konten')
<html>
    <title>create MHS</title>
</html>

<form action='{{ url('mahasiswa') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('mahasiswa/index') }}' class="btn btn-secondary">kembali</a>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' id="jurusan">
                </div>
            </div>
           
            {{-- <div class="mb-3 row">
                <label for="tanggal_absen" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_absen' id="tanggal_absen">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="jam_masuk" class="col-sm-2 col-form-label">Jam Masuk</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name='jam_masuk' id="jam_masuk">
                </div>
            </div> --}}
            
            
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="radio"  name='status' id="status" value="Hadir">Hadir<br>
                    <input type="radio"  name='status' id="status" value="Izin">Izin<br>
                    <input type="radio"  name='status' id="status" value="Sakit">Sakit<br>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
        </div>
    </form>
    @endsection
        <!-- AKHIR FORM -->