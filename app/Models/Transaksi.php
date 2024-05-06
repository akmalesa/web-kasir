<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi'; // Sesuaikan dengan nama tabel yang Anda buat

    protected $fillable = ['tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];
}

