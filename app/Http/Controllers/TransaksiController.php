<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        try {
            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('tanggal', 'desc')->select('id')->first();
            $notrans = $last_id = null ? date('Ymd').'0001': date('Ymd').sprintf('%04d', substr($last_id, 8, 4));

            $insertTransaksi = Transaksi::create([
                'id'                => $notrans,
                'tanggal'           => date('Y-m-d'),
                'total_harga'       => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan'        => ''
            ]);
        }catch (Exception | QueryException |PDOException $e) {
            return $e;
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
