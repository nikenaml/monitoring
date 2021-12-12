
<!--
 export_excel.blade.php
!-->

<!DOCTYPE html>
<html>
<head>
  <title>Export Data to Excel in Laravel using Maatwebsite</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Export Data to Excel in Laravel using Maatwebsite</h3><br />
   <div align="center">
    <a href="{{ route('/falsealarm/export_excel') }}" class="btn btn-success">Export to Excel</a>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <td>Customer Name</td>
      <td>Address</td>
      <td>City</td>
      <td>Postal Code</td>
      <td>Country</td>
     </tr>
     @foreach($customer_data as $customer)
     <tr>
      <td>{{ $customer->CustomerName }}</td>
      <td>{{ $customer->Address }}</td>
      <td>{{ $customer->City }}</td>
      <td>{{ $customer->PostalCode }}</td>
      <td>{{ $customer->Country }}</td>
     </tr>
     @endforeach
    </table>
   </div>

  </div>
 </body>
</html>
