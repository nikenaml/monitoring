@extends('layouts.default')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
                <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="stat-widget-five"> -->
                        <h5 class="card-title text-center">Panduan Penggunaan Sistem Monitoring</h5>
                            <div class="card" >
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                                <div class="card-body text-center">
                                    <p class="card-text text-justify">Dokumen ini berisi tata cara penggunaan web sistem monitoring model yang mencakup penjelasan setiap bagian tampilan serta tata cara dalam pengisian data.</p>
                                    <a href="{{ asset('documents/Dokumentasi Dashboard Sistem Monitoring Model.pdf')}}" class="btn btn-primary align-center">Download Buku Panduan</a>
                                </div>
                            </div>
                            <p class="text-center">Jika mengalami kendala maupun pertanyaan, harap langsung menghubungi Tim Social Listening.</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- .animated -->
@endsection

