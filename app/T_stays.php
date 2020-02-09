<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_stays extends Model
{
    protected $primaryKey = 'stay_id';

    public function room_gallery()
    {
        return $this->hasMany('App\T_room_gallery','room_gallery_id','stay_id');
    }

    public function room_descriptions()
    {
        return $this->hasMany('App\T_room_descriptions','room_descriptions_id','stay_id');
    }

    public function reservation_detail()
    {
        return $this->hasMany('App\T_reservation_detail','reservation_detail_id','stay_id');
    }

    public function stay_rating()
    {
        return $this->hasMany('App\T_stay_rating','stay_rating_id','stay_id');
    }

    public function occupied_reservations()
    {
        return $this->belongsTo('App\T_occupied_reservations','occupied_reservations_id','stay_id');
    }

}
