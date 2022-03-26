@extends('layouts.app')
@section('content')
<div align="center">
<p>&nbsp;</p>
<h1>Add City Details</h1>
<p>&nbsp;</p>
<form method="post" action="/cities/{{$city->id}}">
{{ method_field('PATCH')}}
{{csrf_field()}}

@if($errors->any())
{{$errors->first('city_name')}}
@endif

<tr><th><b>City Name:</b></th><td><input type="text" name="city_name" value="{{old('city_name', $city->city_name)}}"></td>
</tr>
<br>
<br>
@if($errors->any())
{{$errors->first('state_id')}}
@endif
<tr>
<th><b>State Name:</b></th><td>
<select type="text" name="state_id" value="{{old('state_id', $city->state_id)}}">
<option value="">Select State</option>
@foreach($state as $state_detail)
<option value="{{$state_detail->id}}" {{( $state_detail->id == $city->state_id) ? 'selected' : '' }}>{{$state_detail->state_name}}</option>
@endforeach
</select>
</td>
</tr>
<br>
<br>
<tr>
<input type="submit" name="sub" value="Update">
</tr>
</form>
</div>
@endsection