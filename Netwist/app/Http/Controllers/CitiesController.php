<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;

class CitiesController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$city=City::all();


return view('admin.index',compact('city'));

}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$state=State::all();
return view('admin.create',compact('state'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
// print_r($request->input());
// dd();
$this->validate($request,[
'city_name'=>'required',
'state_id'=>'required'
]);

City::create($request->all());
return redirect()->route('cities.index');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{

City::find($id)->update($request->all());
return 1;
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$city=City::find($id);
$state=State::all();
return view('admin.edit',compact('city'))->with(['state'=>$state]);
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request,[
'city_name'=>'required',
'state_id'=>'required'
]);

City::find($id)->update($request->all());

return redirect()->route('cities.index');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
City::find($id)->delete();
return 1;
}
}
