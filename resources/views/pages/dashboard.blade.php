@extends('layouts.default')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
                <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-mail-open-file"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$sum_alert}}</span> Alert Email</div>
                                    <div class="stat-heading">Jumlah Alert Email</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-close-circle"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$sum_false}}</span></div>
                                    <div class="stat-heading">Jumlah False Alarm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-info"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span>{{sprintf("%.2f", $avg_ratio)}}</span> %</div>
                                    <div class="stat-heading">Average False Alarm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <p>sedang dalam proses development</p> -->

        <!--  /Traffic -->
        <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Data False Alarm Terbaru </h4>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($items ?? '' as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->alert_date}}</td>
                                            <td>{{strip_tags($item->note_alert_schedule)}}</td>
                                            <td>{{$item->sum_alert_email}}</td>
                                            <td>{{$item->sum_false_alarm}}</td>
                                            <td>{{$item->ratio_false}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                </div>
            </div>
            <!-- /.orders -->
        <!-- /#add-category -->
        </div>

                <!-- /.orders -->
            <!-- /#add-category -->
    </div>
    <!-- .animated -->
@endsection

