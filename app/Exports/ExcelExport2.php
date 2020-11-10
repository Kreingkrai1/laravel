<?php

namespace App\Exports;

use App\Models\StockCPS;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StockCPS::all();
    }
}
