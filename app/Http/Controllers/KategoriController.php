<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = Kategori::get();
        // dd(compact('data'));
        return view('kategori.index')->with($data);
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
    public function store(StoreKategoriRequest $request)
    {
        Kategori::create($request->all());

        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        // dd($request);
        $kategori->update($request->all());

        return redirect('kategori');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('kategori');
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new KategoriExport, $date.'_kategori.xlsx');
    }

    public function import(Request $request) {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataKategori', $namafile);
        Excel::import(new KategoriImport, public_path('/DataKategori/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}
