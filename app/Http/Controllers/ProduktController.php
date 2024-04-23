<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Http\Requests\StoreProduktRequest;
use App\Http\Requests\UpdateProduktRequest;

class ProduktController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produkt'] = Produkt::get();
        // dd(compact('data'));
        return view('produkt.index')->with($data);
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
    public function store(StoreProduktRequest $request)
    {
        Produkt::create($request->all());

        return redirect('produkt')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produkt $produkt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produkt $produkt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduktRequest $request, Produkt $produkt)
    {
        $produkt->update($request->all());

        return redirect('produkt')->with('success', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produkt $produkt)
    {
        $produkt->delete();
        return redirect('produkt')->with('success', 'Hapus data berhasil');
    }
}
