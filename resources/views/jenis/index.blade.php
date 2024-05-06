@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Jenis</h3>
                <p>Pilih jenis dari produk yang akan kamu jual!!</p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal">tambah data</button>

                <a href="{{ route('export-jenis')}}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>Export</a>

                    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#import"><i class="fas fa-file-excel"></i>Import</button>

                <div class="card p-3">
                    <div class="card-body">
                        @include('jenis.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('jenis.form')

@endsection

@push('script')
<script>
    $(function() {
        $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-success').slideUp(500)
        })

        $('.btn-delete').on('click', function(e) {
      let nama_produk = $(this).closest('tr').find('td:eq(1)').text();
      Swal.fire({
        icon: 'error',
        title: 'Hapus Data',
        html: `Apakah data <b> ${nama_produk} </b>akan dihapus?`,
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
            const nama_jenis = btn.data('nama_jenis')
            const kategori_id = btn.data('kategori_id')
            const id = btn.data('id')
            const modal = $(this)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data pelanggan')
                modal.find('#nama_jenis').val(nama_jenis)
                modal.find('#kategori_id').val(kategori_id)
                modal.find('.modal-content form').attr('action','{{ url("jenis") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data jenis')
                modal.find('#nama_jenis').val('')
                modal.find('#kategori_id').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("jenis") }}')
            }
        })
    })
</script>

@endpush


