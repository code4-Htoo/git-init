<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'id_number' => $row[7],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'gender' => $row[4],
        ]);
    }
}
