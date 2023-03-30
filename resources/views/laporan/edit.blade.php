@extends('layouts.template')
<!-- START FORM -->
@section('konten')
<html>
    <title>Ubah Data</title>
</html>
    

<form action='{{ route('laporan.edit', $laporan->id_jurnal) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('laporan') }}' class="btn btn-secondary">kembali</a>
            <div class="mb-3 row">
                <label for="laporan" class="col-sm-2 col-form-label">Jurnal</label>
                <div class="col-sm-10">
                    <textarea name="laporan" id="laporan" cols="90" rows="7"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jam_input" class="col-sm-2 col-form-label">Tanggal input</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='jam_input' id="jam_input">
                </div>
            </div>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
        </div>
    </form>
    @endsection
        <!-- AKHIR FORM -->