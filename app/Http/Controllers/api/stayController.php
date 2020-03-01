<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TOccupiedReservation as TOCC;
use App\TStay as Stay;
use App\MCode as Type;
use App\MPlace as Highline;
use App\TRoomGallery as gallery;
use App\TStayRating as Rating;
use App\Http\Resources\Search;
use App\Http\Resources\DetailResource;
use App\Http\Resources\HighlineResource;
use App\Http\Resources\CommentResource;


class stayController extends Controller
{
    public function index(){
        return 'ok';
    }
    // search
    public function search()
    {
        $list = Stay::where('city_id',$_GET['city_id'])->get('stay_id');
        $count =TOCC::orWhereBetween('check_in',[$_GET['check_in'],$_GET['check_out']])
        ->orWhereBetween('check_out',[$_GET['check_in'],$_GET['check_out']])
        ->orWhere('check_in','<=',$_GET['check_in'])
        ->Where('check_out','>=',$_GET['check_out'])
        ->whereIn('stay_id',$list)
        ->count();
       
        if($count!=0){
        $get =TOCC::orWhereBetween('check_in',[$_GET['check_in'],$_GET['check_out']])
        ->orWhereBetween('check_out',[$_GET['check_in'],$_GET['check_out']])
        ->orWhere('check_in','<=',$_GET['check_in'])
        ->Where('check_out','>=',$_GET['check_out'])->distinct()
        ->get('stay_id');
        $data = Stay::where('city_id',$_GET['city_id'])->whereNotIn('stay_id',$get)->paginate(20);
       
        }else{
            $data = Stay::where('city_id',$_GET['city_id'])->paginate(20);
        }
        return new Search($data);
        
    }
    // get hightline
    public function stayGetHighlightPlaces(){
        $data = Highline::inRandomOrder()->limit(5)->get();
        return HighlineResource::collection($data);
    }
    //get slice
    public function getSlicesByType(){
        return 'ok';
    }
    // get detail
    public function getStayDetail($id){
        $data =Stay::where('stay_id',$id)->get();
        return DetailResource::collection($data);
    }
    // get comment
    public function getStayComments($id){
        $data =Rating::where('stay_id',$id)->get();
        return CommentResource::collection($data);
    }
    // post comments
    public function postStayComment(Request $request){

        $reponse = Rating::create([
            'comment' => $request->comment,
            'stay_id' =>$request->stayId,
            'rate' =>$request->commentRate,
            'guest_id'=>$request->userId
        ]);
        return response()->json(['status'=>200], 200);
        

    }
 
    public function getStay()
    {
        $data = Type::where('code_group',$_GET['code_group'])->where('lang',(isset($_GET['lang']))?$_GET['lang']:"VI")->first();

        return response()->json($data, 200);
    }
}
