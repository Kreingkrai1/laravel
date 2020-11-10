<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Exports\ExcelExport2;
use App\Imports\CsvImport;
use App\Imports\CsvImportCPS;
use App\Models\StockCPS;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Trnin2ShopList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;
use Storage;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $test_connect = DB::connection('mysql2')->select("SELECT * FROM trn_in2shop_list");
        // dd($test_connect);

        $brand = Auth::user()->brand;
        if ($brand == "op") {
            $data = Trnin2ShopList::all()->toArray();
        } else {
            $data = StockCPS::all()->toArray();
        }
        return view('import', [
            'datas' => $data,
            'brand' => $brand
        ]);
    }

    public function csv_import(Request $request)
    {
        $brand = Auth::user()->brand;
        if ($brand == "op") {
            Excel::import(new CsvImport, request()->file('file_import'));
            DB::select("DELETE FROM trnin2shoplists WHERE corporation_id = 'corporation_id'");
            return back();
        } else {
            Excel::import(new CsvImportCPS, request()->file('file_import'));
            DB::select("DELETE FROM trnin2shoplists WHERE corporation_id = 'corporation_id'");
            return back();
        }
    }

    public function export(Request $request)
    {
        $brand = Auth::user()->brand;
        if ($brand == "op") {
            $file_name = $request->file_name;
            return Excel::download(new ExcelExport, "$file_name.xlsx");
        } else {
            $file_name = $request->file_name;
            return Excel::download(new ExcelExport2, "$file_name.xlsx");
        }
    }

    public function clear(Request $request)
    {
        $brand = Auth::user()->brand;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 5; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
        }
        $date = date("Y_m_d");
        if ($brand == "op") {
            $table_db = "trnin2shoplist_BK_$randstring$date";
            $tb = "trnin2shoplists";
        } else {
            $table_db = "stockcoutecps_BK_$randstring$date";
            $tb = "stockcoutecps";
        }

        if ($brand == "op") {
            $data = Trnin2ShopList::count();
        } else {
            $data = StockCPS::count();
        }
        if ($data == 0) {
            return response()->json(["msg" => "คุณได้ Clear ข้อมูลเรียบร้อยแล้ว", "status" => "N"]);
        } else {
            $action = $request->action;
            if ($action == "clear") {
                DB::select("CREATE TABLE $table_db SELECT * FROM $tb");
                DB::select("DELETE FROM $tb");
                // return response()->json(["msg" => $request->form_data, "status" => "Y"]);
            } else {
                return response()->json(["msg" => "ไม่สามารถ ลบ ข้อมูลได้", "status" => "N"]);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
