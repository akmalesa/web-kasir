@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">pelanggan</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, a!</p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">tambah data</button>
                <div class="card p-3">
                    <div class="card-body">
                        @include('pelanggan.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pelanggan.form')

@endsection

@push('script')
<script>
    $(function() {
        $('#modal').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            console.log(btn.data('mode'))
            const nama = btn.data('nama')
            const email = btn.data('email')
            const no_telepon = btn.data('no_telepon')
            const alamat = btn.data('alamat')
            const id = btn.data('id')
            const modal = $(this)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data pelanggan')
                modal.find('#nama').val(nama)
                modal.find('#email').val(email)
                modal.find('#no_telepon').val(no_telepon)
                modal.find('#alamat').val(alamat)
                modal.find('.modal-content form').attr('action','{{ url("pelanggan") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data pelanggan')
                modal.find('#nama').val('')
                modal.find('#email').val('')
                modal.find('#no_telepon').val('')
                modal.find('#alamat').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("pelanggan") }}')
            }
        })
    })
</script>

@endpush


