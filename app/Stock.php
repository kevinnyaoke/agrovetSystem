<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable=['item','quantity','bprice','sprice','date','description'];
}
