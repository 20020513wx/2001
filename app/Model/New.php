<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class New extends Model
{
    protected $table="new";
    protected $primaryKey="new_id";
    public $timestamps=false;
    protected $guarded=[];

}
