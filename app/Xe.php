<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xe extends Model
{
    //
    protected $table = "xe";
    protected $primaryKey = 'idxe';
    public function ChuyenXe()
    {
    	return $this->hasMany('App\ChuyenXe','idxe','idxe');
    }
}
