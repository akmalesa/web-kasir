<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Models\Kategori;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] = Jenis::with(['kategori'])->latest()->get();
        // dd(compact('data'));
        $data['kategoris'] = Kategori::pluck('nama','id');
        return view('jenis.index')->with($data);
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
    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());

        return redirect('jenis');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jenis)
    {
        $jenis->update($request->all());

        return redirect('jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis)
    {
        $jenis->delete();
        return redirect('jenis');
    }
}
