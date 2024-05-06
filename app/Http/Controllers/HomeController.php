<?php

namespace App\Http\Controllers;

// use App\Models\DetailTransaksi;

use App\Models\DetailT;
use App\Models\Menu;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        $menu = Menu::get();
        $stok = Stok::get();
        $terjual = DetailT::select('menu_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('menu_id')
            ->get();
        $jumlahTransaksi = Transaksi::count();
        $jumlahPendapatan = Transaksi::sum('total_harga');

        // $transaksis = Transaksi::latest()->take(5)->get();

        // $transaksi_terbaru = DetailTransaksi::select('detail_transaksis.*', 'transaksis.tanggal', 'transaksis.total_harga', 'transaksis.metode_pembayaran', 'transaksis.keterangan')
        // ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
        // ->orderBy('transaksis.tanggal', 'desc')
        // ->limit(5) // Ambil lima transaksi terbaru
        // ->get();

        // $terbaru = DetailTransaksi::select('menu_id', DB::raw('SUM(jumlah) as subtotal'))
        //     ->groupBy('menu_id')
        //     ->get();

        return view('dashboard', [
            'user' => $user,
            'menu' => $menu,
            'stok' => $stok,
            'terjual' => $terjual,
            'jumlah_transaksi' => $jumlahTransaksi,
            'jumlah_pendapatan' => $jumlahPendapatan,
            // 'transaksis' => $transaksi_terbaru,
            // 'terbaru' => $terbaru
        ]);
    }
    public function about(){
        return view('templates.about');
    }
    // public function contact(){
    //     return view('contact');
    // }
}
