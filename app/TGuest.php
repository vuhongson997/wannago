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

class TGuest extends Model
{
    protected $primaryKey = 'guest_id';

    public function reservations()
    {
        return $this->hasMany('App\T_reservations','reservations_id','guest_id');
    }

    public function occupied_reservation()
    {
        return $this->hasMany('App\T_occupied_reservation','occupied_reservation_id','guest_id');
    }

    public function stay_rating()
    {
        return $this->hasMany('App\T_stay_rating','stay_rating_id','guest_id');
    }

    protected $table = 't_guest';
}
