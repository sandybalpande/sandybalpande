<?php

use App\Jobs\sendEmailJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
        

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>['auth','admin']],function(){
	Route::get('download','DownloadController@index');
	Route::get('downloadFile/{filename}','DownloadController@downloadFile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

