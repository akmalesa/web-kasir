@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Stok produk</h3>
                <p></p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal">tambah data</button>

                <a href="{{ route('export-stok')}}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>Export</a>

                    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#import"><i class="fas fa-file-excel"></i>Import</button>

                <div class="card p-3">
                    <div class="card-body">
                        @include('stok.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('stok.form')

@endsection

@push('script')
<script>
    $(function() {

        $('.btn-delete').on('click', function(e) {
      let menu_id = $(this).closest('tr').find('td:eq(1)').text();
      Swal.fire({
        icon: 'error',
        title: 'Hapus Data',
        html: `Apakah data <b> ${menu_id} </b>akan dihapus?`,
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
            const menu_id = btn.data('menu_id')
            const jumlah = btn.data('jumlah')
            const id = btn.data('id')
            const modal = $(this)
            console.log(menu_id)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data stok')
                modal.find('#menu_id').val(menu_id)
                modal.find('#jumlah').val(jumlah)
                modal.find('.modal-content form').attr('action','{{ url("stok") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data stok')
                modal.find('#menu_id').val('')
                modal.find('#jumlah').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("stok") }}')
            }
        })
    })
</script>

@endpush


