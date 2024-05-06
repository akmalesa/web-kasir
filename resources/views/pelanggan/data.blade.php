<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No Telepon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pelanggan as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->no_telepon }}</td>
            <td>{{ $p->alamat }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $p->id }}"
                data-nama="{{ $p->nama }}"
                data-email="{{ $p->email }}"
                data-no_telepon="{{ $p->no_telepon }}"
                data-alamat="{{ $p->alamat }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="pelanggan/{{ $p->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
