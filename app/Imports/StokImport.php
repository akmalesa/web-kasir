<?php

namespace App\Imports;


use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stok([
            // 'id' => $row[0],
            'menu_id' => $row['menu_id'],
            'jumlah' => $row['jumlah']
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
