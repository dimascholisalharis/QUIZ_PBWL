@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">

	<style type="text/css">
		h2 {
			margin-bottom: 20px;
			margin-top: 15px;
			color: salmon;
			font-family: 'Capriola', sans-serif;
			font-size: 30px;
		}
		
		.btn {
			color: dimgray;
		}
		label {
			font-family: 'Handlee', cursive; 
			color: dimgray;
		}
	</style>
</head>
<body>
	<div class="container">
	<div class="col-md-10">

	<h2>Edit Data Played</h2>
	<form action="{{ url('/played/' . $rows->id)}}" method="post">
	<input name="_method" type="hidden" value="patch">
	@csrf

	<table>
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 20px">Tracks</label>:
		<div class="col-sm-5">
			<select name="tracks_id" class="form-control" style="background-color: salmon; color: white">
				@foreach($tracks as $row)
				<option value="{{$row->id}}"
				@if($row->id ==$rows->id)
				selected
				@endif
				>{{$row->tracks_name}} - {{ $row->album->artist->artist_name}}</option>
				@endforeach
			</select>
		</div>
		</div>

	</table>
			<div class="form-group row">
			<div class="col-sm-10">
				<input type="submit" value="Update" class="btn" style="background-color: #D7BDE2">
			<div>
			</div>
	</form>
</div>
</body>
</html>

@endsection