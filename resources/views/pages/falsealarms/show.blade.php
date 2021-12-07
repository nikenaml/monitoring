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
        <td>{{ $item->sum_alert_email }}</td>
    </tr>

    <tr>
        <th>Id Komentar Salah Prediksi per Schedule</th>
        <td>{{ $item->id_komentar }}</td>
    </tr>

    <tr>
        <th>Jumlah Komentar Salah Prediksi All Schedule</th>
        <td>{{ $item->sum_false_alarm }}</td>
    </tr>
</table>
