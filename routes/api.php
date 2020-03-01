<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user','api\userController@getUser');

Route::get('province','api\provinceController@index');

Route::get('stay/search','api\stayController@search');

Route::get('stay/get-highlight-places','api\stayController@stayGetHighlightPlaces');

Route::get('stay/get-slices-by-type','api\stayController@getSlicesByType');

Route::get('stay/{stay_id}/detail','api\stayController@getStayDetail');

Route::get('stay/{stay_id}/comments','api\stayController@getStayComments');

Route::get('host/{host_id}/info', 'api\userController@getHostInfo');
//POST 

Route::post('/stay/comments','api\stayController@postStayComment');

Route::post('booking/add', 'api\BookingController@addBooking');


// Put
Route::put('booking/update','api\BookingController@updateBooking');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
