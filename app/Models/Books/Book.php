<?php

namespace App\Models\Books;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model {

    public $timestamps = true;
    protected $table = 'books';
    protected $fillable = [
    ];

    use SoftDeletes;

    protected $tables = ['deleted_at'];

    public function order()
    {
     return $this->belongsToMany('App\Models\OrderBook\Order','order_books');

    }
}


