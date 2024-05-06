<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Id Menu</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stok as $s)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $s->menu_id }}</td>
            <td>{{ $s->jumlah }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $s->id }}"
                data-menu_id="{{ $s->menu_id }}"
                data-jumlah="{{ $s->jumlah }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="stok/{{ $s->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
