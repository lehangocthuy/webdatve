<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuyenXe extends Model
{
    //

    protected $table = "tuyenxe";
    protected $primaryKey = 'idtuyenxe';
    public function ChuyenXe()
    {
    	return $this->hasMany('App\ChuyenXe','idtuyenxe', 'idtuyenxe');
    }
    public function Xe()
    {
    	return $this->hasManyThrough('App\Xe','App\ChuyenXe','idtuyenxe','idchuyenxe','idtuyenxe');
    }
    
}
