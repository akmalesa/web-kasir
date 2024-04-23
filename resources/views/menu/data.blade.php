<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga</th>
        <th scope="col">Image</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">jenis</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($menus as $m)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $m->nama_menu }}</td>
            <td>{{ $m->harga }}</td>
            <td>{{ $m->image }}</td>
            <td>{{ $m->deskripsi }}</td>
            <td>{{ $m->jenis->nama_jenis }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $m->id }}"
                data-nama_menu="{{ $m->nama_menu }}" data-harga="{{ $m->harga }}" data-image="{{ $m->image }}" data-jenis_id="{{ $m->jenis_id }}" data-deskripsi="{{ $m->deskripsi }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="menu/{{ $m->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
