<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'sweetwater_test';
    protected $primaryKey = 'orderid';
    public $timestamps = false;

    protected $fillable = [
        'comments',
        'orderid',
        'shipdate_expected',
    ];


}
