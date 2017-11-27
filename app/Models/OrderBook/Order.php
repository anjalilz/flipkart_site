<?php

namespace App\Models\OrderBook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {

    public $timestamps = true;
    protected $table = 'orders';
    protected $fillable = [
    ];

    use SoftDeletes;

    protected $tables = ['deleted_at'];
    
    public function book()
    {
        return $this->belongsToMany('App\Models\Books\Book','order_books');

    }

}


