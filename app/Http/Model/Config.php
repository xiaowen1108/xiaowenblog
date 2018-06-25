<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table='config';
    protected $primaryKey='id';
    protected $dateFormat = 'U';
    protected $guarded=[];
}
