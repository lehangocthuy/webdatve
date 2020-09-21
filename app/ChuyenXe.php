<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenXe extends Model
{
    //
    protected $table = "chuyenxe";
    protected $primaryKey = 'idchuyenxe';
    public function TuyenXe()
    {
    	return $this->belongTo('App\TuyenXe','idtuyenxe','idchuyenxe');
    }
    public function Ve()
    {
    	return $this->hasMany('App\Ve','idchuyenxe','idchuyenxe');
    }
    public function Xe()
    {
    	return $this->belongTo('App\Xe','idxe','idchuyenxe');
    }

}
