<?php

namespace App\Imports;

use App\Models\TimeTable;
use Maatwebsite\Excel\Concerns\ToModel;


class TimeTablesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       return new TimeTable([
           /* 'term'     => $row['0'],
            'degree'    => $row['1'],
            'batch'     => $row['2'],
            'centre'    => $row['3'],
            'subject'     => $row['4'],
            'subcode'    => $row['5'],
            'reg_no'     => $row['6'],
            'graduate'    => 'UG',*/
            'date'              => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['0']),
            'day'               => $row['1'],
            'session'           => $row['2'],
            'subcode'           => $row['3'],
            'graduate'          => $row['4'],
            
           
        ]);
        
    }
}
