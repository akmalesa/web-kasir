<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($jenis as $j)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $j->nama_jenis }}</td>
            <td>{{@$j->kategori->nama }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $j->id }}"
                data-nama_jenis="{{ $j->nama_jenis }}"
                data-kategori_id="{{ $j->kategori_id }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="jenis/{{ $j->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
