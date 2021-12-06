@extends ('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data False Alarm</strong>
            <p></p>
            <p>Pengisian form ini hanya dibatasi sekali saja setiap ada kesalahan/sehari sekali. Jika terdapat beberapa kesalahan pada schedule yang berbeda seperti di pagi dan siang hari, atau di ketiga schedule semuanya terdapat prediksi kesalahan, harap melakukan update/edit data dan jangan klik bagian menambah data.</p>
            <p></p>
            <p>Form ini difokuskan untuk pengisian prediksi kesalahan berdasarkan tanggal alert bukan berdasarkan pembagian waktu schedule nya.</p>
            <p></p>
            <p>Panduan pengisian form ini terdapat di bagian "Panduan Pengisian". Jika ada kendala maupun pertanyaan, harap langsung menghubungi Tim Social Listening.</p>

        </div>

        <div class="card-body card-block">
            <form action="{{route('falsealarms.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="tanggal_alert" class="form-control-label">Tanggal Alert Email</label>
                    <!-- value kenapa old? agar jika error inputannya ga hilang, jadi tetap ada isinya, ga isi dari ulang, makanya ada old nya, mengambil isian yang sebelumnya -->
                    <input type="date" name="tanggal_alert" value="{{old('tanggal_alert')}}" class="form-control @error('tanggal_alert') is-invalid @enderror"/>
                    <!-- datetime-local -->
                    @error('tanggal_alert') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="note_alert_schedule" class="form-control-label">Note Jumlah Alert per schedule</label>
                    <input type="text" name="note_alert_schedule" value="{{old('note_alert_schedule')}}" class="form-control @error('note_alert_schedule') is-invalid @enderror"/>
                    @error('note_alert_email') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="sum_alert_email" class="form-control-label">Total Alert All Schedule</label>
                    <input type="number" name="sum_alert_email" value="{{old('sum_alert_email')}}" class="form-control @error('sum_alert_email') is-invalid @enderror"/>
                    @error('sum_alert_email') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="id_komentar" class="form-control-label">Id Komentar Salah Prediksi per Schedule</label>
                    <textarea name="id_komentar" class="editor form-control @error('id_komentar') is-invalid @enderror">{{old('id_komentar')}}</textarea>
                    @error('id_komentar') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="sum_false_alarm" class="form-control-label">Jumlah Komentar Salah Prediksi All Schedule</label>
                    <input type="number" name="sum_false_alarm" value="{{old('sum_false_alarm')}}" class="form-control @error('sum_false_alarm') is-invalid @enderror"/>
                    @error('sum_false_alarm') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                    Tambah Data False Alarm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
