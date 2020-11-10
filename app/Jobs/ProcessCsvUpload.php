<?php

namespace App\Jobs;

use App\Models\trnin2shoplists;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProcessCsvUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('upload-csv')->allow(1)->every(20)->then(function () {
            dump('processing this file:----', $this->file);
            $data = array_map('str_getcsv', file($this->file));
            foreach ($data as $row) {
                // dd($row);
                trnin2shoplists::updateOrCreate([
                    'corporation_id'    => $row['1']
                ],[
                    'company_id'        => $row['2'],
                    'branch_id'         => $row['3'],
                    'doc_date'          => $row['4'],
                    'doc_no'            => $row['5'],
                    'seq'               => $row['6'],
                    'product_id'        => $row['7'],
                    'quantity'          => $row['8'],
                    'flag1'             => $row['9'],
                    'status_transfer'   => $row['10'],
                ]);
            }
            dump('done this file:----', $this->file);
            unlink($this->file);
        }, function () {
            return $this->release(10);
        });
    }
}
