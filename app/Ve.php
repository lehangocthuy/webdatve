<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    //
    protected $table = "ve";
    // protected $primaryKey = 'idve';
    public function ChuyenXe()
    {
    	return $this->belongTo('App\Chuyenxe','idchuyenxe','id');
    }
    // public function GioVe()
    // {
    // 	return $this->belongTo('App\GioVe','idgiove','id');
    // }
   public function Xe()
   {
   		return $this->hasManyThrough('App\Xe','App\ChuyenXe','idve','idchuyenxe','id');
   }
   public function NguoiDi()
   {
    return $this->hasMany('App\NguoiDi','idve','id');
   }
}
