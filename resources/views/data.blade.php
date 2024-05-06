@extends('templates.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome to Dashboard</h3>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                      <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                          <div class="card-body">
                            <p class="mb-4">sisa stok</p>
                            <p class="fs-30 mb-2">@foreach($menus_with_stock as $p)
                                <div>Nama Menu: {{ $p->menu_id }}</div>
                                <td>{{ $p->jumlah }}</td>
                                <!-- Ubah 'nama' dengan nama kolom yang ingin ditampilkan -->
                                @endforeach</p>
                            <p>10.00% (30 days)</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                          <div class="card-body">
                            <p class="mb-4">Total Bookings</p>
                            <p class="fs-30 mb-2">61344</p>
                            <p>22.00% (30 days)</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                          <div class="card-body">
                            <p class="mb-4">Number of Meetings</p>
                            <p class="fs-30 mb-2">34040</p>
                            <p>2.00% (30 days)</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                          <div class="card-body">
                            <p class="mb-4">Number of Clients</p>
                            <p class="fs-30 mb-2">47033</p>
                            <p>0.22% (30 days)</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- <div class="count">{{ $count_menu }}</div> --}}

                {{-- @if(isset($pelanggan) && is_array($pelanggan) && count($pelanggan) > 0)
                <div class="count">Ada {{ count($pelanggan) }} pelanggan:</div>
                <ul>
                    @foreach($pelanggan as $p)
                    <div>Nama Pelanggan: {{ $p->nama }}</div>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->alamat }}</td>
                    <!-- Ubah 'nama' dengan nama kolom yang ingin ditampilkan -->
                    @endforeach
                </ul>
                @else
                <div class="count">Tidak ada data pelanggan.</div>
                @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection
