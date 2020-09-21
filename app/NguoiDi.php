<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDi extends Model
{
    //
    protected $table = 'nguoidi';
    public function Ve()
    {
    	return $this->belongTo('App\Ve','idve','id');
    }
}
