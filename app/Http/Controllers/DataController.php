<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        // Mengambil 10 pelanggan terakhir
    $data['pelanggan'] = Pelanggan::latest()->take(10)->get();

    // Variabel lain yang mungkin Anda butuhkan
    $data['count_menu'] = Menu::count(); // Contoh pengambilan jumlah menu

    // Meneruskan data ke tampilan 'data'
    return view('data', $data);
    }
}
