<?php
namespace App\Exports;

use App\Models\Trnin2ShopList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//class PostsExport implements FromCollection
//{
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        return Post::all();
//    }
//}

class ExcelExport implements FromView
{
    public function view(): View
    {
        return view('posts-excel', [
            'datas' => Trnin2ShopList::all()
        ]);
    }
}