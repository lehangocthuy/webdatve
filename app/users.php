<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class users extends Model
{
    //
   
    protected $table = "users";
    protected $primaryKey = 'idtk';
   
    public function Ve()
    {
    	return $this->hasManyThrough('App\Ve','App\GioVe','idtk','idgiove','id');
    }
}
