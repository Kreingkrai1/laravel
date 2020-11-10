<?php

namespace App\Imports;

use App\Models\Trnin2ShopList;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Trnin2ShopList([
            'corporation_id'    => $row['1'],
            'company_id'        => $row['2'],
            'branch_id'         => $row['3'],
            'doc_date'          => $row['4'],
            'doc_no'            => $row['5'],
            'seq'               => $row['6'],
            'product_id'        => $row['7'],
            'quantity'          => $row['8'],
            'flag1'             => $row['9'],
            'status_transfer'   => $row['10'],
            'created_at'        => $row['11'],
            'updated_at'        => $row['12'],
        ]);
    }
}
