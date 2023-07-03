<?php

namespace App\Imports;

use App\Models\Galy;
use Maatwebsite\Excel\Concerns\ToModel;


class GaliesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       return new Galy([
            'term'     => $row['0'],
            'degree'    => $row['1'],
            'batch'     => $row['2'],
            'centre'    => $row['3'],
            'subject'     => $row['4'],
            'subcode'    => $row['5'],
            'reg_no'     => $row['6'],
           
        ]);
        
    }
}
