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

class TOccupiedReservation extends Model
{
    protected $primaryKey = 'occupied_reservation_id';

    protected $table = 't_occupied_reservations';

    protected $fillable =[
      'check_out',
      'check_in',
      'status',
      'stay_id',
      'guest_id'
    ];
}
