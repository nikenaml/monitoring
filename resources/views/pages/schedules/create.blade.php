@extends ('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data Schedule</strong>
        </div>

        <div class="card-body card-block">
            <form action="{{route('schedules.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Schedule</label>
                    <!-- value kenapa old? agar jika error inputannya ga hilang, jadi tetap ada isinya, ga isi dari ulang, makanya ada old nya, mengambil isian yang sebelumnya -->
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Konten</label>
                    <input type="text" name="type" value="{{old('type')}}" class="form-control @error('type') is-invalid @enderror"/>
                    @error('type') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <!-- ckeditor berfungsi membuat format tulisan word di dalam textarea yang meliputi ada bold,italic,underline dam format dari tulisan word lainnya -->
                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi Schedule</label>
                    <textarea name="description", value="{{old('description')}}" class="editor form-control @error('description') is-invalid @enderror"></textarea>
                    @error('description') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                    Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
