@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">

	<style type="text/css">
		h2	{
			margin-bottom: 20px;
			margin-top: 15px;
			color: salmon;
			font-family: 'Capriola', sans-serif;
			font-size: 35px;
			
		}
		table th {
			color: dimgray;
			font-family: 'Handlee', cursive;
		}
		table {
			margin-top: 10px;
			text-align: center;
		}
		body {
			font-family:'Handlee', cursive; 
		}
	</style>
</head>

<body>
	<div class="container">
	<h2>Data Played</h2>
	<a  href="{{ url('played/create') }}" class="btn btn-success bg-succes">+ Tambah Data</a>
	<table class="table">
		<thead class="bg-light">
		<tr style="background-color:#D7BDE2">
			<th scope="col">NO</th>
			<th scope="col">JUDUL</th>
			<th scope="col">TRACKS</th>
			<th scope="col">EDIT</th>
		</tr>

		@foreach($rows as $row)
		<tr style="background-color: #fFF5EE; color: indianred">
			<td>{{ $row->id }}</td>
			<td>{{ $row->tracks->album->artist->artist_name}} - {{ $row->tracks->tracks_name }}</td>
			<td>
				<audio controls><source src="{{ url('public/uploads/tracks/'. $row->tracks->tracks_file) }}" type="audio/mpeg" ></audio>
			</td>
			<td>
				<a href="{{ url('played/' . $row->id . '/edit')}}" class="btn btn-warning">Edit</a>
				
				<form action="{{ url('played/' . $row->id)}}" method="post" class="d-inline">
					<input name="_method" type="hidden" value="delete">
					@csrf
					<button class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	
</div>
</body>
</html>


@endsection