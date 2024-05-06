<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Karyawan</th>
        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Waktu Masuk</th>
        <th scope="col">Status</th>
        <th scope="col">Waktu Keluar</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($absensi as $a)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $a->namaKaryawan }}</td>
            <td>{{ $a->tanggalMasuk }}</td>
            <td>{{ $a->waktuMasuk }}</td>
            <td>{{ $a->status }}</td>
            <td>{{ $a->waktuKeluar }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $a->id }}"
                data-namakaryawan="{{ $a->namaKaryawan }}"
                data-tanggalmasuk="{{ $a->tanggalMasuk }}"
                data-waktumasuk="{{ $a->waktuMasuk }}"
                data-status="{{ $a->status }}"
                data-waktukeluar="{{ $a->waktuKeluar }}" data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="absensi/{{ $a->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
