<?php
/* 
 * Author: Khoa Trần
 * ADD: 
	- 
 * EDIT:
    - Tên File và Class
    -
 * DELETE
    -   
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class TStay extends Model
{
    protected $table = 't_stay';
    
    protected $primaryKey = 'stay_id';

    protected $fillable = [
        'stay_name',
        'stay_type_id',
        'host_id',
        'address_id',
        'city_id',
        'host_id',
        'lang',
        'price',
        'discount',
        'description',
        'guest_count',
        'bed_count',
        'bath_count',
        'wifi',
        'smoking',
        'cooler',
        'refrigerator',
        'pool',
        'kitchen'
    ];

    public function code()
    {
        return $this->hasOne('App\MCode','id','stay_type_id');
    }
    // public function host()
    // {
    //     return $this->belongsTo('App\THost');
    // }

    public function room_gallery()
    {
        return $this->belongsTo('App\TRoomGallery','stay_id');
    }

    public function places()
    {
        return $this->hasOne('App\MPlace','code_place','city_id');
    }

    // public function room_descriptions()
    // {
    //     return $this->hasMany('App\T_room_descriptions','room_descriptions_id','stay_id');
    // }

    // public function reservation_detail()
    // {
    //     return $this->hasMany('App\T_reservation_detail','reservation_detail_id','stay_id');
    // }

    // public function stay_rating()
    // {
    //     return $this->hasMany('App\T_stay_rating','stay_rating_id','stay_id');
    // }

    // public function occupied_reservations()
    // {
    //     return $this->belongsTo('App\T_occupied_reservations','occupied_reservations_id','stay_id');
    // }

}
