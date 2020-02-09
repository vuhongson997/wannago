<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_guest extends Model
{
    protected $primaryKey = 'guest_id';

    public function reservations()
    {
        return $this->hasMany('App\T_reservations','reservations_id','guest_id');
    }

    public function reservation_detail()
    {
        return $this->hasMany('App\T_reservation_detail','reservation_detail_id','guest_id');
    }

    public function stay_rating()
    {
        return $this->hasMany('App\T_stay_rating','stay_rating_id','guest_id');
    }
}
