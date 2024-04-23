<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">No Meja</th>
        <th scope="col">Kapasitas</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($meja as $m)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $m->nomor_meja }}</td>
            <td>{{ $m->kapasitas }}</td>
            <td>{{ $m->status }}</td>

            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $m->id }}"
                data-nomor_meja="{{ $m->nomor_meja }}" data-kapasitas="{{ $m->kapasitas }}" data-status="{{ $m->status }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="meja/{{ $m->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
