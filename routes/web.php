<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $data = [];
//     $data['version'] = '0.0.1';
//     return view("welcome",$data);
// });

// Route::get('/about', function(){
//     $response_array = [];
//     $response_array["author"] = "AJ";
//     $response_array["version"] = "0.0.1";

//     return $response_array;
// });

// Route::get('/di','ClientController@di');

// Route::get('/db',function(){
//     DB::select('Select * from table');
// });

// Route::get('/encrypt',function(){
//     return Crypt::encrypt('123456789');
// });

// Route::get('/decrypt',function(){
//     return Crypt::decrypt('eyJpdiI6IllKakhlcjVsXC9FUXZUZ3RCcHhzSE1BPT0iLCJ2YWx1ZSI6InVFK2UwRk16RlczSDgxWG8wdkJ3QkZVTTlRSmRsNXl4K3krWTNOeUtwb0U9IiwibWFjIjoiN2M5ODk1MDgwMmEzZmQwOTg4ZjdhOTc1YmMyODFjNzJmZjYwOTQ0NmQyYTM0M2E5MWFmYWY2NWM0N2U1ZWQ5NCJ9');
// });

Route::get('/','ContentController@home') -> name('home');
Route::get('/clients','ClientController@index')-> name('clients');
Route::get('/clients/new','ClientController@newClient')->name('new_client');
Route::post('/clients/new','ClientController@newClient')-> name('create_client');
Route::get('/clients/{client_id}','ClientController@show')-> name('show_client');
Route::post('/clients/{client_id}','ClientController@modify')-> name('update_client');

Route::get('/reservations/{client_id}','RoomController@checkAvailableRooms') -> name('check_room');
Route::post('/reservations/{client_id','RoomController@checkAvailableRooms')->name('check_room');

Route::get('book/room/{client_id}/{room_id}/{date_in}/{date_out}','ReservationController@bookRoom') -> name('book_room');