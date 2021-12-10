<div class="modal-header text-center d-block">
  <h5 class="modal-title">Preview Data {{ $s->name }}</h5>
</div>

<div class="modal-body">
  <!-- get the post details by using the post id that is passed in url -->
    <table class="table">
        <tr>
            <th class="font-weight-bold">Nama Schedule</th>
            <td class="text-left">{{ $s->name }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">Tipe Schedule</th>
            <td class="text-left">{{ $s->type }}</td>
        </tr>

        <tr>
            <th class="font-weight-bold">Deskripsi Schedule</th>
            <td class="text-left">{{ strip_tags($s->description) }}</td>
        </tr>
    </table>
</div>

<!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div> -->
