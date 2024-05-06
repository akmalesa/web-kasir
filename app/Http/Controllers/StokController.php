<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Models\Menu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;
use App\Imports\StokImport;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['stok'] = Stok::with(['menu'])->latest()->get();
        // dd(compact('data'));
        $data['menus'] = Menu::pluck('nama_menu','id');

        return view('stok.index')->with($data);

        } catch (QueryException | Exception | PDOException $error){
            return "terjadi kesalahan".$error->getMessage();
        }
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
    public function store(StoreStokRequest $request)
    {
        try {
            DB::beginTransaction();
             Stok::create($request->all());

            DB::commit();

        return redirect('stok');

        } catch (QueryException | Exception | PDOException $error) {
             DB::rollBack();
             $this->failResponse($error->getMessage(), $error->getCode());
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        $stok->update($request->all());

        return redirect('stok')->with('success','data berhasil di ubah ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();

            return redirect('stok');

        } catch (QueryException | Exception | PDOException $error){

            DB::rollback();

            return "terjadi kesalahan".$error->getMessage();
        }
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new StokExport, $date.'_stok.xlsx');
    }

    public function import(Request $request) {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataStok', $namafile);
        Excel::import(new StokImport, public_path('/DataStok/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}
