<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
        $data['menus'] = Menu::with(['jenis'])->latest()->get();
        // dd(compact('data'));
        $data['jenis'] = Jenis::pluck('nama_jenis','id');
        return view('menu.index')->with($data);

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
    public function store(StoreMenuRequest $request)
{
    try {
        DB::beginTransaction();

        $image = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path = $image->storeAs('public/image', $filename); // Simpan gambar menggunakan storeAs()

        $data['nama_menu'] = $request->nama_menu;
        $data['harga'] = $request->harga; // Perhatikan, di sini ada spasi di akhir
        $data['image'] = $filename; // Simpan nama file gambar, bukan objek Request
        $data['deskripsi'] = $request->deskripsi;
        $data['jenis_id'] = $request->jenis_id;

        Menu::create($data); // Simpan data yang sudah disiapkan

        DB::commit();

        return redirect('menu');

    } catch (QueryException | Exception | PDOException $error) {
         DB::rollBack();
         $this->failResponse($error->getMessage(), $error->getCode());
     }
}

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {

            $menu->delete();

            return redirect('menu');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date.'_menu.xlsx');
    }

    public function import(Request $request){
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataMenu', $namafile);
        Excel::import(new MenuImport, \public_path('/DataMenu/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}
