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
                    <label for="tanggal_komentar" class="form-control-label">Tanggal Alert Email</label>
                    <!-- value kenapa old? agar jika error inputannya ga hilang, jadi tetap ada isinya, ga isi dari ulang, makanya ada old nya, mengambil isian yang sebelumnya -->
                    <input type="date" name="tanggal_komentar" value="{{old('tanggal_komentar')}}" class="form-control @error('tanggal_komentar') is-invalid @enderror"/>
                    @error('tanggal_komentar') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="sum_alert_email" class="form-control-label">Jumlah Alert Email</label>
                    <input type="number" name="sum_alert_email" value="{{old('sum_alert_email')}}" class="form-control @error('sum_alert_email') is-invalid @enderror"/>
                    @error('sum_alert_email') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="form-control-label">Waktu Schedule</label>
                    <select name="schedules_id" class="form-control @error('schedules_id') is invalid @enderror">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}">{{$schedule->name}}</option>
                        @endforeach
                    </select>
                    @error('schedules_id') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="sum_false_alarm" class="form-control-label">Jumlah Alert Email</label>
                    <input type="number" name="sum_false_alarm" value="{{old('sum_false_alarm')}}" class="form-control @error('sum_false_alarm') is-invalid @enderror"/>
                    @error('sum_false_alarm') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="id_komentar" class="form-control-label">Id Komentar False</label>
                    <input type="number" name="id_komentar" value="{{old('id_komentar')}}" class="form-control @error('id_komentar') is-invalid @enderror"/>
                    @error('id_komentar') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="sum_false_alarm" class="form-control-label">Jumlah False Alarm</label>
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
