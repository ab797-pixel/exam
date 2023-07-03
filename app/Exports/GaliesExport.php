<?php

namespace App\Exports;

use App\Models\Galy;
use Maatwebsite\Excel\Concerns\FromCollection;

class GaliesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Galy::all();
    }
}