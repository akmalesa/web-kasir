@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Absensi Kerja Karyawan</h3>
                <p></p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">tambah data</button>
                <div class="card p-3">
                    <div class="card-body">
                        @include('absensi.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('absensi.form')

@endsection

@push('script')
<script>
    $(function() {

        $('.btn-delete').on('click', function(e) {
      let namaKaryawan = $(this).closest('tr').find('td:eq(1)').text();
      Swal.fire({
        icon: 'error',
        title: 'Hapus Data',
        html: `Apakah data <b> ${namaKaryawan} </b>akan dihapus?`,
        confirmButtonText: 'Ya',
        denyButtonText: 'Tidak',
        showDenyButton: true,
        focusConfirm: false
      }).then((result) => {
        if (result.isConfirmed) $(e.target).closest('form').submit()
        else swal.close()
      })
    })

        $('#modal').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            console.log(btn.data('mode'))
            const namaKaryawan = btn.data('namakaryawan')
            const tanggalMasuk = btn.data('tanggalmasuk')
            const waktuMasuk = btn.data('waktumasuk')
            const status = btn.data('status')
            const waktuKeluar = btn.data('waktukeluar')
            const id = btn.data('id')
            const modal = $(this)
            console.log(namaKaryawan)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data absensi')
                modal.find('#namaKaryawan').val(namaKaryawan)
                modal.find('#tanggalMasuk').val(tanggalMasuk)
                modal.find('#waktuMasuk').val(waktuMasuk)
                modal.find('#status').val(status)
                modal.find('#waktuKeluar').val(waktuKeluar)
                modal.find('.modal-content form').attr('action','{{ url("absensi") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data absensi')
                modal.find('#namaKaryawan').val('')
                modal.find('#tanggalMasuk').val('')
                modal.find('#waktuMasuk').val('')
                modal.find('#status').val('')
                modal.find('#waktuKeluar').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("absensi") }}')
            }
        })
    })
</script>

@endpush


