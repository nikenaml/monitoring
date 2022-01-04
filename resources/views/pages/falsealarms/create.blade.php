@extends ('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data False Alarm</strong>
        </div>

        <div class="card-body card-block">
            <form action="{{route('falsealarms.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="alert_date" class="form-control-label">Tanggal Alert Email</label>
                    <!-- value kenapa old? agar jika error inputannya ga hilang, jadi tetap ada isinya, ga isi dari ulang, makanya ada old nya, mengambil isian yang sebelumnya -->
                    <input type="date" name="alert_date" value="{{old('alert_date')}}" class="form-control @error('alert_date') is-invalid @enderror"/>
                    <!-- datetime-local -->
                    @error('alert_date') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="note_alert_schedule" class="form-control-label">Note Jumlah Alert per schedule</label>
                    <textarea name="note_alert_schedule" class="form-control @error('note_alert_schedule') is-invalid @enderror" rows=3>
Pagi={{old('note_alert_schedule')}}
Siang={{old('note_alert_schedule')}}
Sore={{old('note_alert_schedule')}}</textarea>
                    @error('note_alert_email') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="sum_alert_email" class="form-control-label">Total Alert All Schedule</label>
                    <input type="number" name="sum_alert_email" value="{{old('sum_alert_email')}}" class="form-control @error('sum_alert_email') is-invalid @enderror"/>
                    @error('sum_alert_email') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="id_comment" class="form-control-label">URL Komentar Salah Prediksi per Schedule</label>
                    <textarea name="id_comment" class="editor form-control @error('id_comment') is-invalid @enderror">{{old('id_comment')}}</textarea>
                    @error('id_comment') <div class="text-muted">{{$message}}</div> @enderror
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
