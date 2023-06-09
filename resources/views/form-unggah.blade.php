@extends('layouts.template2')       
        <!-- START DATA -->
               
        @section('konten')
<!DOCTYPE html>
<html>
<head>
	<title>Tugas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
</head>
<body>
	<div class="row">
		<div class="container">
			<h2 class="text-center my-5">Upload Foto</h2>
			
			<div class="col-lg-8 mx-auto my-5">	
 
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
 
				<form action="/upload2/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<b>File</b><br/>
						<input type="file" name="file">
					</div>
 
					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="tanggal_upload">Tanggal upload</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name='tanggal_upload'>
						</div>
					</div>
 
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
				<h4 class="my-2">Data</h4>
 				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">File</th>
							<th>Keterangan</th>
							<th width="2%">tanggal upload</th>
							<th width="1%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach($Unggah as $g)
						<tr>
							<td><img width="150px" src="{{ url('/data_file2/'.$g->file) }}"></td>
							<td>{{$g->keterangan}}</td>
							<td>{{$g->tanggal_upload}}</td>
							<td><a class="btn btn-danger" href="/upload2/hapus/{{ $g->id }}">HAPUS</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
			</div>
		</div>
	</div>
</body>
</html>