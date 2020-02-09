<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_address extends Model
{
    protected $primaryKey = 'address_id';

    public function stays()
    {
        return $this->hasMany('App\T_stays','stay_id','address_id');
    }
}
