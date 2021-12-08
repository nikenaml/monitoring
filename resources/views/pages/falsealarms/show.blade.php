<div class="modal-header text-center d-block">
  <h5 class="modal-title">Preview Data {{ $fa->tanggal_alert }}</h5>
</div>

<div class="modal-body">
  <!-- get the post details by using the post id that is passed in url -->
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Alert</th>
            <td>{{ $fa->tanggal_alert }}</td>
        </tr>

        <tr>
            <th>Note Jumlah Alert per schedule</th>
            <td>{{ $fa->note_alert_schedule }}</td>
        </tr>

        <tr>
            <th>Total Alert All Schedule</th>
            <td>{{ $fa->sum_alert_email }}</td>
        </tr>

        <tr>
            <th>Id Komentar Salah Prediksi per Schedule</th>
            <td>{{ strip_tags($fa->id_komentar) }}</td>
        </tr>

        <tr>
            <th>Jumlah Komentar Salah Prediksi All Schedule</th>
            <td>{{ $fa->sum_false_alarm }}</td>
        </tr>

        <tr>
            <th>Persentase Salah Prediksi</th>
            <td>{{sprintf("%.3f", $fa->sum_false_alarm / $fa->sum_alert_email)}}</td>
        </tr>
    </table>
</div>

<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
