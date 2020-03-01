<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TReservation as Order;
use App\TReservationDetail as Detail;
use App\TOccupiedReservation as Pending;

class BookingController extends Controller
{
    public function addBooking(Request $request){
        $order = Order::create([
            'guest_id' => $request->userId,
            'custommer_name'=>$request->customerName,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'price'=>$request->totalPrice,
            'payment_code'=>$request->paymentCode,
            'status'=>$request->status,
            'guest_count'=>$request->guestCount,

        ]);

        Detail::create([
            'check_out'=>$request->checkOut,
            'check_in'=>$request->checkIn,
            'quantity'=>1,
            'status'=>$request->statusCode,
            'reservation_id'=>$order->reservation_id,
            'stay_id'=>$request->stayId,

            ]);
        Pending::create([
            'check_out'=>$request->checkOut,
            'check_in'=>$request->checkIn,
            'status'=>1,
            'stay_id'=>$request->stayId,
            'guest_id' => $request->userId,
        ]);    

            return response()->json(['status'=>200], 200);
    }

    public function updateBooking(Request $request){
            return 'ok';
            // Pending::updateOrCreate(
            //     ['guest_id'=>$request->userId,'stay_id'=>$request->stayId],
            // [
            //     'check_in'=>$request->checkIn,
            //     'check_out'=>$request->checkOut,
            //     'status'=>0,
            //     'stay_id'=>$request->stayId,
            //     'cus_name'=>$request->customerName,
            //     'guest_id'=>$request->userId,
            //     'phone'=>$request->phone,
            //     'email'=>$request->email,
            //     'guest_count'=>$request->guestCount,
            //     'price'=>$request->totalPrice   
            // ]
            // );
            // return response()->json(['status'=>200], 200);
    }

}
