<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Role;

class UserResource1 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->when(Role::where('id',$this->role_id)->first(),$this->role),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
           
        ];
    }
}
