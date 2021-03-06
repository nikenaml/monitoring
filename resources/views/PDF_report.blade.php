<!DOCTYPE html>
<html>
<head>
	<title>Rekap Laporan Data False Alarm</title>
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
		<h5>Rekap Laporan Data False Alarm</h4>
        <br>
        <br>
	</center>

	<table class='table table-bordered text-center'>
		<thead>
			<tr>
                <th>No</th>
                <th>Tanggal Alert</th>
                <!-- <th>Waktu Schedule</th> -->
                <th>Note Jumlah Alert per schedule</th>
                <th>Total Alert</th>
                <!-- <th>Id Komentar Salah Prediksi per Schedule</th> -->
                <th>Jumlah Komentar Salah Prediksi</th>
                <th>Persentase Salah Prediksi (%)</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($PDFReport as $PDFReports)
			<tr>
                <td>{{$PDFReports->id}}</td>
                <td>{{$PDFReports->alert_date}}</td>
                <td>{{strip_tags($PDFReports->note_alert_schedule)}}</td>
                <td>{{$PDFReports->sum_alert_email}}</td>
                <td>{{$PDFReports->sum_false_alarm}}</td>
                <td>{{sprintf("%.2f", ($PDFReports->sum_false_alarm / $PDFReports->sum_alert_email)*100)}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
