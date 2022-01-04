<div class="modal-header text-center d-block">
  <h5 class="modal-title">Preview Data {{ $fa->alert_date }}</h5>
</div>

<div class="modal-body">
  <!-- get the post details by using the post id that is passed in url -->
    <table class="table">
        <tr>
            <th class="font-weight-bold">Tanggal Alert</th>
            <td class="text-left">{{ $fa->alert_date }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">Note Jumlah Alert per schedule</th>
            <td class="text-left">{{ $fa->note_alert_schedule }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">Total Alert All Schedule</th>
            <td class="text-left">{{ $fa->sum_alert_email }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">URL Komentar Salah Prediksi per Schedule</th>
            <td class="text-left">{{ strip_tags($fa->id_comment) }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">Jumlah Komentar Salah Prediksi All Schedule</th>
            <td class="text-left">{{ $fa->sum_false_alarm }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">Persentase Salah Prediksi</th>
            <td class="text-left">{{sprintf("%.3f", $fa->sum_false_alarm / $fa->sum_alert_email)}}</td>
        </tr>
    </table>
</div>

<!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div> -->
