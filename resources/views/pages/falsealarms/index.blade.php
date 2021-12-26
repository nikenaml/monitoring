@extends ('layouts.default')

@section('content')
<head>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    @if(Session::has('success'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    </div>
    @endif

    @if(Session::has('info'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
        <div class="alert alert-info">
            {{Session::get('info')}}
        </div>
    </div>
    @endif

    @if(Session::has('error'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    </div>
    @endif

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title"> Daftar Data False Alarm</h4>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <form action="/falsealarm/filterdate" class="form-inline">
                                    <div class="form-group mr-sm-3 mb-2">
                                        {{csrf_field()}}
                                        <input type="date" name="from" class="form-control" id="from">s/d
                                        <input type="date" name="to" class="form-control ml-3" id="to">
                                        <button type="submit" class="btn btn-primary btn-sm ml-2">View</button>
                                        <!-- <div class="col-md-6"> -->
                                        <!-- <button type="submit" class="btn btn-primary btn-sm ml-2" name="search" >Search</button> -->
                                        <!-- <button type="submit" class="btn btn-secondary btn-sm ml-2" name="exportPDF" >export PDF</button> -->
                                        <!-- <button type="submit" class="btn btn-success btn-sm ml-2" name="exportExcel">export Excel</button> -->
                                        <!-- </div> -->
                                        <!-- <a class="btn btn-primary float-right mr-3" href="{{ URL::to('/falsealarm/pdfdate') }}" target="_blank">Export to PDF date</a> -->
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <!-- <a class="btn btn-primary float-right ml-2" href="{{ URL::to('/falsealarm/export_pdf') }}" target="_blank">Export to PDF</a> -->
                                <!-- <a class="btn btn-success float-right" href="{{ URL::to('/falsealarm/export_excel') }}" target="_blank">Export to Excel</a> -->
                                <button class="btn btn-primary float-right ml-2" onclick="exportPDF()" id="exportpdf">Export to PDF</button>
                                <button class="btn btn-success float-right text-white" onclick="exportExcel()">Export to Excel</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($fas ?? '' as $fa)
                                        <tr>
                                            <td>{{$fa->id}}</td>
                                            <td>{{$fa->alert_date}}</td>
                                            <td>{{strip_tags($fa->note_alert_schedule)}}</td>
                                            <td>{{$fa->sum_alert_email}}</td>
                                            <!-- <td>{{strip_tags($fa->id_comment)}}</td> -->
                                            <td>{{$fa->sum_false_alarm}}</td>
                                            <!-- <td>{{sprintf("%.2f", ($fa->sum_false_alarm / $fa->sum_alert_email)*100)}}</td> -->
                                            <td>{{$fa->ratio_false}}</td>

                                            <td>
                                                <a href="#mymodal"
                                                    data-remote="{{ route('falsealarms.show', $fa->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <div id="mymodal" class="modal fade text-center">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body"></div>
                                                            <div class="modal-footer"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="mymodal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"></div>
                                                        <div class="modal-footer"></div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <!-- data-title="Detail waktu {{ $fa->alert_date}}" -->
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
                <div class="d-flex justify-content-center">
                            {!! $fas->appends(Request::all())->links() !!}
                </div>
                Showing 1 to 10 of {{$fas->total()}}
            </div>
        </div>
    <!-- </div> -->

    <script>
        function exportPDF() {
            const from = $('#from').val();
            const to = $('#to').val();
            window.open(`/falsealarm/export_pdf?from=${from}&to=${to}`,'_blank');
            // $.ajax({
            //     async: false,
            //     type: 'get',
            //     url: "{{url('falsealarm/export_pdf')}}",
            //     data: {
            //         _token: '{{csrf_token()}}',
            //         from: from,
            //         to: to
            //     },
            //     success: function(res) {
            //         window.open(downloadUrl,'_blank');
            //         console.log('response', res)
            //     }
            // })
        }
        function exportExcel() {
            const from = $('#from').val();
            const to = $('#to').val();
            window.open(`/falsealarm/export_excel?from=${from}&to=${to}`,'_blank');
        }
</script>
</body>
@endsection
