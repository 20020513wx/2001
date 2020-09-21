<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goodstype extends Model
{
    protected $table="goodstype";
    protected $primaryKey="cat_id";
    public $timestamps=false;
    protected $guarded=[];
}
