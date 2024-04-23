<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="jenis">
        @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_jenis">nama </label>
                    <input type="text" class="form-control" id="nama_jenis" name="nama_jenis">
                </div>

                <div class="form-group">
                    <label for="kategori_id" class="col-form-label">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $c => $label )
                        <option value="{{ $c }}">{{ $label }}</option>
                    @endforeach
                </select>
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
