@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Kategori</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, a!</p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">tambah data</button>
                <div class="card p-3">
                    <div class="card-body">
                        @include('kategori.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('kategori.form')

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
            const nama = btn.data('nama')
            const id = btn.data('id')
            const modal = $(this)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data pelanggan')
                modal.find('#nama').val(nama)
                modal.find('.modal-content form').attr('action','{{ url("kategori") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data kategori')
                modal.find('#nama').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("kategori") }}')
            }
        })
    })
</script>

@endpush


