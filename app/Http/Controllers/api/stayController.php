<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\T_occupied_reservations;
use App\T_stays;
use App\Http\Resources\searchResource;
class stayController extends Controller
{
    public function index(){
        return 'ok';
    }

    public function search()
    {
        $count =T_occupied_reservations::where('check_in','<=',$_GET['check_in'])
        ->where('check_out','>=',$_GET['check_out'])
        ->count();
        if($count!=0){
        $get =T_occupied_reservations::where('check_in','<=',$_GET['check_in'])
        ->where('check_out','>=',$_GET['check_out'])->distinct()
        ->get('stay_id');
        $data = T_stays::where('city_id',$_GET['city_id'])->whereIn('stay_id',$get)->get();
       
        }else{
            $data = T_stays::where('city_id',$_GET['city_id'])->get();
        }
        return $data;
        
    }
}
