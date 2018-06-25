<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table='tags';
    protected $dateFormat = 'U';
    protected $guarded=[];
}
