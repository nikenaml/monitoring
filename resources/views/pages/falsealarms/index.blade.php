@extends ('layouts.default')

@section('content')
<head>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title"> Daftar Data False Alarm</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Alert</th>
                                        <!-- <th>Waktu Schedule</th> -->
                                        <th>Note Jumlah Alert per schedule</th>
                                        <th>Total Alert all schedule</th>
                                        <!-- <th>Id Komentar Salah Prediksi per Schedule</th> -->
                                        <th>Jumlah Komentar Salah Prediksi All Schedule</th>
                                        <th>Persentase Salah Prediksi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($fas ?? '' as $fa)
                                        <tr>
                                            <td>{{$fa->id}}</td>
                                            <td>{{$fa->tanggal_alert}}</td>
                                            <td>{{strip_tags($fa->note_alert_schedule)}}</td>
                                            <td>{{$fa->sum_alert_email}}</td>
                                            <!-- <td>{{strip_tags($fa->id_komentar)}}</td> -->
                                            <td>{{$fa->sum_false_alarm}}</td>
                                            <td>{{sprintf("%.3f", $fa->sum_false_alarm / $fa->sum_alert_email)}}</td>

                                            <td>
                                                <a href="{{route('falsealarms.edit', $fa->id)}}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <form action="{{route('falsealarms.destroy', $fa->id)}}"
                                                    method="post"
                                                    class="d-inline">

                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <!-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $fa->id }}" data-action="{{ route('falsealarms.destroy',$fa->id) }}">  <i class="fa fa-trash"></i></button> -->
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                            Data Tidak Tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>


            </div>
        </div>
    </div>
    <script type="text/javascript">
  $("body").on("click",".remove-user",function(){
    var current_object = $(this);
    swal({
        title: "Are You Sure For Delete?",
        text: "Data yang terhapus tidak dapat dikembalikan akan terhapus secara permanent!",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script>
</body>
@endsection
