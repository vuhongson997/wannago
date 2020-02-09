<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_reservations extends Model
{
    protected $primaryKey = 'reservation_id';

    public function reservation_detail()
    {
        return $this->hasMany('App\T_reservation_detail','reservation_detail_id','reservation_id');
    }
}
