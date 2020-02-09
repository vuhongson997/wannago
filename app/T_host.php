<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_host extends Model
{
    protected $primaryKey = 'host_id';

    public function stays()
    {
        return $this->hasMany('App\T_stays','stay_id','host_id');
    }
}
