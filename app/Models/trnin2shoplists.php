<?php

namespace App\Models;

use App\Jobs\ProcessCsvUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trnin2shoplists extends Model
{
    protected $guarded =[];
    
    public function importTodb()
    {
        $path = resource_path('pending-files/*.csv');
        $files = glob($path);

        foreach ($files as $file) {
           ProcessCsvUpload::dispatch($file);
        }
    }
}
