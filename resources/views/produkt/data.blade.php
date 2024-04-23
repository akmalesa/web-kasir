<table class="table table-hover table-responsive-md" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Nama Suplier</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Stok</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produkt as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->nama_suplier }}</td>
            <td>{{ $p->harga_beli }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stok }}</td>
            <td>{{ $p->keterangan }}</td>
            <td>
                <button class="btn" type="button" title="Edit"
                data-mode="edit"
                data-id="{{ $p->id }}"
                data-nama_produk ="{{ $p->nama_produk }}"
                data-nama_suplier="{{ $p->nama_suplier }}"
                data-harga_beli  ="{{ $p->harga_beli }}"
                data-harga_jual  ="{{ $p->harga_jual }}"
                data-stok        ="{{ $p->stok }}"
                data-keterangan  ="{{ $p->keterangan }}"
                data-target="#modal" data-toggle="modal">
                    <i class="ti-pencil text-success"></i>
                </button>
                <form action="produkt/{{ $p->id }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" title="DELETE"><i class="ti-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
