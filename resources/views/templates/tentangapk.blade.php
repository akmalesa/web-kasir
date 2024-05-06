@extends('templates.layout')
@push('style')

@endpush


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Tentang Aplikasi</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, a!</p>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <h6>Tentang Aplikasi</h6>
                    <p>Aplikasi ini dibuat baru baru ini</p>
                    <br>
                    <h6>Layanan Aplikasi</h6>
                    <table border="1px" class="col-3" >
                        <tr>
                            <td>
                                Melayani tentang pemesanan makanan dan minuman
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h6>Sejarah Aplikasi</h6>
                    <p>Aplikasi dibuat sebagai project dengan penuh perjuangan setiap harinya.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>

</script>

@endpush
