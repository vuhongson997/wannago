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

class THost extends Model
{
    protected $primaryKey = 'host_id';

    public function stays()
    {
        return $this->hasMany('App\T_stay','stay_id','host_id');
    }

    protected $table = 't_host';
}
