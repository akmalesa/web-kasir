<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['absensi'] = Absensi::get();

            return view('absensi.index')->with($data);

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
    public function store(StoreAbsensiRequest $request)
    {
        try {
            DB::beginTransaction();
             Absensi::create($request->all());

            DB::commit();

        return redirect('absensi');

        } catch (QueryException | Exception | PDOException $error) {
             DB::rollBack();
             $this->failResponse($error->getMessage(), $error->getCode());
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $absensi->update($request->all());

        return redirect('absensi')->with('success','data berhasil di ubah ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        try {
            $absensi->delete();

            return redirect('absensi');

        } catch (QueryException | Exception | PDOException $error){

            DB::rollback();

            return "terjadi kesalahan".$error->getMessage();
        }
    }
}
