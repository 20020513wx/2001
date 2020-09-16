<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table="menu";
    protected $primaryKey="menu_id";
    public $timestamps=false;
    protected $guarded=[];
}
