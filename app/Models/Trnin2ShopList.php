<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trnin2ShopList extends Model
{
    protected $connection = 'mysql';
    protected $table = 'stock_count';
    protected $fillable = [
        'id',
        'shop',
        'brand',
        'month',
        'product_type',
        'product',
        'quantity_09',
        'quantity_10',
        'quantity_11',
        'quantity_12',
        'quantity_13',
        'datetime',

    ];
}
