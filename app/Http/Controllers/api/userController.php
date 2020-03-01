<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\HostResource;
class userController extends Controller
{
    public function getUser(){
        
        $data = User::paginate(1);
      
       return new UserResource($data);
    }

    public function getHostInfo($id){
        $data = User::where('id',$id)->get();
        return HostResource::collection($data);
    }
}
