<?php

namespace App\Models\OrderBook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orderBook extends Model {

    public $timestamps = true;
    protected $table = 'order_books';
    protected $fillable = [
    ];

    use SoftDeletes;

    protected $tables = ['deleted_at'];

}

