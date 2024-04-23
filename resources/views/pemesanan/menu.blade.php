<ul class="menu-container">
    @foreach ($jenis as $j)
        <li class="list-group-item">
            <h3>{{  $j->nama_jenis }}</h3>
            <ul class="">
                <div class="row">
                    @foreach ($j->menu as $menu)
                        <div class="col-md-3  menu-item" data-id="{{ $menu->id }}" data-nama_menu="{{ $menu->nama_menu }}" data-harga="{{ $menu->harga }}">
                        <li class="list-group-item">{{ $menu->nama_menu }}</li>
                        <li class="list-group-item">{{ $menu->harga }}</li>
                    </div>
                    @endforeach
                </div>
            </ul>
        </li>
    @endforeach
</ul>
