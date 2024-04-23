<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="produkt">
        @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                </div>

                <div class="form-group">
                    <label for="nama_suplier">Nama Suplier</label>
                    <input type="text" class="form-control" id="nama_suplier" name="nama_suplier">
                </div>

                <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="double" class="form-control" id="harga_beli" name="harga_beli">
                </div>

                <div class="form-group">
                    <label for="harga_jual">Harga Jualprivate function calculateHargaJual($hargaBeli)
                        {
                            $hargaJual = $hargaBeli * 1.7;
                            return round($hargaJual / 500) * 500;
                        }</label>
                    <input type="double" class="form-control" id="harga_jual" name="harga_jual">
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok">
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
