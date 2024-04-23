<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kategoris as $c)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $c->nama }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $c->id }}"
                data-nama="{{ $c->nama }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="kategori/{{ $c->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
