@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Produk</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, a!</p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">tambah data</button>
                <div class="card p-3">
                    <div class="card-body">
                        @include('produkt.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('produkt.form')

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
            const nama_produk = btn.data('nama_produk')
            const nama_suplier = btn.data('nama_suplier')
            const harga_beli = btn.data('harga_beli')
            const harga_jual = btn.data('harga_jual')
            const stok = btn.data('stok')
            const keterangan = btn.data('keterangan')
            const id = btn.data('id')
            const modal = $(this)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data pelanggan')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('#nama_suplier').val(nama_suplier)
                modal.find('#harga_beli').val(harga_beli)
                modal.find('#harga_jual').val(harga_jual)
                modal.find('#stok').val(stok)
                modal.find('#keterangan').val(keterangan)
                modal.find('.modal-content form').attr('action','{{ url("produkt") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data produkt')
                modal.find('#nama_produk').val('')
                modal.find('#nama_suplier').val('')
                modal.find('#harga_beli').val('')
                modal.find('#harga_jual').val('')
                modal.find('#stok').val('')
                modal.find('#keterangan').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("produkt") }}')
            }
        })
    })
</script>

@endpush


