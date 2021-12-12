<!DOCTYPE html>
<html>
<head>
	<title>Rekap Laporan Data Schedule</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 10pt;
		}
	</style>

	<!-- <img src="{{URL::asset('/images/logo-sinarmas.png')}}"> -->
	<!-- <img src="{{ public_path('logo-sinarmas.png') }}"> -->
	<img src="{{ public_path('./images/logo-sinarmas.png') }}" style="width: 200px; height: 50px">

	<center>
        <br>
        <br>
		<h5>Rekap Laporan Data Schedule</h4>
        <br>
        <br>
	</center>

	<table class='table table-bordered text-center'>
		<thead>
			<tr>
                <th>No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($sch ?? '' as $s)
			<tr>
                <td>{{ i++}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->type}}</td>
                <td>{{strip_tags($s->description)}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
