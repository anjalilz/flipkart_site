<?php

namespace App\Models\Books;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCart extends Model {

    public $timestamps = true;
    protected $table = 'user_carts';
    protected $fillable = [
    ];

    use SoftDeletes;

    protected $tables = ['deleted_at'];

}


