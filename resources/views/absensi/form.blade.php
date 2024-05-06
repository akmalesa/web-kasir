<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="absensi">
        @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaKaryawan">Nama Karyawan</label>
                    <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan">
                </div>

                <div class="form-group">
                    <label for="tanggalMasuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk">
                </div>

                <div class="form-group">
                    <label for="waktuMasuk">Waktu Masuk</label>
                    <input type="time" class="form-control" id="waktuMasuk" name="waktuMasuk">
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="masuk">Masuk</option>
                        <option value="cuti">Cuti</option>
                        <option value="sakit">Sakit</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="waktuKeluar">Waktu Keluar</label>
                    <input type="time" class="form-control" id="waktuKeluar" name="waktuKeluar">
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
