<?php

use Illuminate\Http\Request;
use cacoma\User;
use cacoma\City;
use cacoma\Uf;
use cacoma\Country;
use Illuminate\Support\Facades\Input;
use cacoma\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
// Comentei dia 02/11/2017 as 19:01 - Rodrigo Machado.
//use Validator;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/searchcities',function(){
 $query = Input::get('query');
 $cities = City::where('name','like',$query.'%')->get();
 return response()->json($cities);
});
Route::get('/searchufs',function(){
 $query = Input::get('event');
 $cityUfID = City::where('name', $query )->value('uf_id');
 //DB::select('select uf_id from cities where name = :name', ['name' => $query ]);
 $uf = Uf::where('id', $cityUfID )->value('name');
 //DB::select('select name from ufs where id = :id', ['id' => $cityUfID]);
 return response()->json($uf);
});
Route::get('/searchcountry',function(){
 $query = Input::get('event');
 $city = City::where('name', $query )->value('uf_id');
 $uf = Uf::where('id', $city )->value('country_id');
 $country = Country::where('id', $uf )->value('name');
 //$UfID = Uf::where('uf_id', $cityUfID )->value('country_id');
 //DB::select('select uf_id from cities where name = :name', ['name' => $query ]);
 //$country = Country::where('id', $UfCountryID )->value('name');
 //DB::select('select name from ufs where id = :id', ['id' => $cityUfID]);
 return response()->json($country);
});
Route::get('/listarusuarios', function() {
  $query = Input::get('query');
  $field = Input::get('field');
  if ($field == ""){
  $users = User::where('name', 'like','%'.$query.'%')->get();
} else {
  $users = User::where($field, 'like','%'.$query.'%')->get();
}
	return response()->json($users);
});
// Route::patch('/users/{id}','UserController@update');
// Route::patch('/updateusers',function(Request $request) {
//
//
// //   $validation = Validator::make($request,[
// //        'name' => 'required|max:255',
// //        'email' => 'required',
// //    ]);
// //
// //    if($validation->fails()){
// //      $errors = $validation->errors();
// //
// //      return $errors->toJson();
// //
// //     } else {
// //     $userUp = User::where('id','=',$request->id)->get();
// //
// //
// //   $userUp->name = $request->name;
// //   $userUp->email = $request->email;
// //
// //
// //   if ($userUp->save()) {
// //
// //   return response()->json([
// //       'message' => 'User updated successfully!'
// //   ], 200);
// // }else{
// //   return response()->json([
// //       'error' => 'User NOT updated!'
// //   ], 200);
// // }
// // }
// } //fim do route patch updateusers
//
//
// );
?>
