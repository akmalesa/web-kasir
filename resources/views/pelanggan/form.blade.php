<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="pelanggan">
        @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" maxlength="12">
                </div>

                <script>
                document.getElementById('no_telepon').addEventListener('input', function(event) {
                    this.value = this.value.replace(/\D/g, '').slice(0, 12);
                });
                </script>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
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


<div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center mr-3 py-3">
            <h3 class="modal-title" id="staticBackdropLabel">Import Data</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('import-pelanggan') }}" method="POST" class="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                  <input type="file" name="file" required>
                </div>
            </div>
            <div class="modal-footer pt-3 pb-0">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary" id="simpan">Simpan Perubahan</button>
            </div>
          </div>
        </form>
    </div>
  </div>
