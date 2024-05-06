@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Meja</h3>
                <p>Jika status Free berarti kosong jika Booked berarti penuh!!!</p>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">tambah data</button>
                <div class="card p-3">
                    <div class="card-body">
                        @include('meja.data')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('meja.form')

@endsection

@push('script')
<script>
    $(function() {
        $('#modal').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            console.log(btn.data('mode'))
            const nomor_meja = btn.data('nomor_meja')
            const kapasitas = btn.data('kapasitas')
            const status = btn.data('status')
            const id = btn.data('id')
            const modal = $(this)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data pelanggan')
                modal.find('#nomor_meja').val(nomor_meja)
                modal.find('#kapasitas').val(kapasitas)
                modal.find('#status').val(status)
                modal.find('.modal-content form').attr('action','{{ url("meja") }}/'+id)
                modal.find('#method').html('@method("PUT")')
            }else{
                modal.find('.modal-title').text('Input Data meja')
                modal.find('#nomor_meja').val('')
                modal.find('#kapasitas').val('')
                modal.find('#status').val('')
                modal.find('#method').html('')
                modal.find('.modal-content form').attr('action','{{ url("meja") }}')
            }
        })
    })
</script>

@endpush


