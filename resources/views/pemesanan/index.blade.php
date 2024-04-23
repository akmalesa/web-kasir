@extends('templates.layout')
@push('style')
<style>
    .row {
        display: flex;
    }
    .col-menu {
        flex: 0 0 70%; /* Lebar kolom menu */
    }
    .col-order {
        flex: 1; /* Kolom order akan mengisi sisa ruang yang tersedia */
        margin-left: 10px; /* Jarak antara kolom menu dan kolom order */
    }
</style>
@endpush

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-8">
                <!-- Kolom Menu -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pemesanan</h5>
                        <!-- Isi dengan menu atau fitur lainnya -->
                    </div>
                    @include('pemesanan.menu')
                </div>
            </div>
            <div class="col-md-4">
                <!-- Kolom Menu -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total</h5>
                        <div class="">
                            <ul class="ordered-list">

                            </ul>
                            Total bayar : <h2 id="total">0</h2>
                            <div>
                                <button id="btn-bayar">Bayar</button>
                            </div>
                        </div>
                        <!-- Isi dengan menu atau fitur lainnya -->
                    </div>
                </div>
            </div>
            <div class="col-order">
                <!-- Kolom Order -->
            </div>
        </div>
    </section>
@endsection
@push('script')
<script>
$(function(){
        const orderedList = [];
        let total = 0;

        const sum = () => {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga * object.qty);
            },0)
        }

        const changeQty = (el,inc) => {
            const id = $(el).closest('li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.id == id)
            orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

            const txt_subtotal =$(el).closest('li').find('.subtotal')[0];
            const txt_qty =$(el).closest('li').find('.qty-item')[0]
            txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
            txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

            $('#total').html(sum())
        }

        //events
    $('.ordered-list').on('click','.btn-dec', function(){changeQty(this, -1)})

    $('.ordered-list').on('click','.btn-inc', function(){changeQty(this, 1)})

    $('.ordered-list').on('click','.remove-item',function(){
        const item = $(this).closest('li')[0];
        let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id))
        orderedList.splice(index,1)
        $(item).remove();
        $('#total').html(sum())
    })

    $('#btn-bayar').on('click', function(){
        $.ajax({
            url: "{{ route('pemesanan.store') }}",
            method: "POST",

            data: {
                "_token": "{{ csrf_token() }}",
                orderedList: orderedList,
                total: sum()
            },
            success: function(data){
                console.log(data)
            }
        })
    })

        $(".menu-item").click(function(){
            // const menu_clicked = $(this).text();
            const nama_menu = $(this).data('nama_menu')
            const data = $(this)[0].dataset;
            const harga =  parseFloat(data.harga);
            const id = parseInt(data.id)
            console.log(nama_menu);

            if(orderedList.every(list => list.id !== id)){
                let dataN = {'id': id, 'menu': nama_menu, 'harga': harga, 'qty':1}
                console.log(dataN)
                orderedList.push(dataN);
                let listOrder = `<li data-id="${id}"><h3 class="list-group-item">${nama_menu}</h3>`
                listOrder += `<button class='remove-item'>hapus</button>
                            <button class="btn-dec"> - </button>`
                listOrder += `<input class="qty-item"
                                    type="number"
                                    value="1"
                                    style="width:30px"
                                    readonly
                                    />
                            <button class="btn-inc">+</button>
                            <p class="subtotal">Rp. <span class="subtotal">${harga * 1}</span></p>
                            </li>`
                $('.ordered-list').append(listOrder)
            }
            $('#total').html(sum())
        });
    });
</script>
@endpush


