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


// Route::get('/',function(){
// 	//print_r(app()->make('redis'));
// 	$redis=app()->make('redis');
// 	$redis->set('key','sandeep');
// 	$redis->set('key1','Kishor');
// 	return $redis->get('key1');
// });


Route::get('checkout', array(
    'as'    =>  'checkout',
    'uses'  =>  function() {
        return redirect()->route('checkout', 'yor-random-string-here');
}));

Route::get('checkout/{random_string}', array(
    'as'    =>  'checkout',
    'uses'  =>  function($randomString) {
        // do whatever you have to do here ...
        return $randomString;
}));

Route::get('/', function () {
    return view('welcome');
});

Route::get('send','mailController@send');

Auth::routes();

Route::group(['middleware'=>['auth','admin']],function(){
	Route::resource('employees','EmployeeController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('item_menu','ItemMenu@getItemMenu');
Route::post('addItemMenu','ItemMenu@addItemMenu');