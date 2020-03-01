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

class TReservation extends Model
{
    protected $primaryKey = 'reservation_id';

    public function reservation_detail()
    {
        return $this->hasMany('App\T_reservation_detail','reservation_detail_id','reservation_id');
    }

    protected $table = 't_reservations';
    
    protected $fillable = [
    'guest_id',
    'custommer_name',
    'phone',
    'email',
    'price',
    'payment_code',
    'status',
    'guest_count'];
}
