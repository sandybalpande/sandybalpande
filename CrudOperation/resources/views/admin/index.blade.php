@extends('layouts.app')
@section('content')
<div class="container">  
<div class="row">
<div class="col-sm-4">
<div class="full-right form-group">
<a href="item_menu" class="btn btn-primary">
Add Item Menu
</a>
</div>
</div>
<div class="col-sm-8">
<div class="full-right">
<select>
	<option> Menu Item List</option>
@if($item_menu->all())
@foreach($item_menu as $item)
<option value="{{$item->id}}">{{$item->name}}</option>
@endforeach
@endif
</select>	
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="full-right">
<h2>
Employee Details
</h2>
</div>
</div>
</div>
<table class="table table-bordered">
<tr>
<th width="80px">No</th>
<th>Employee Name</th>
<th>Email</th>
<th>Salary</th>
<th>Address</th>
<th width="140px" class="text-center" colspan="2">
<a href="{{route('employees.create')}}" class="btn btn-success btn-sm">
<i class="glyphicon glyphicon-plus"></i>
</a>
</th>
</tr>
<?php $no=1; ?>
@foreach($employee as $key => $value)
<tr>
<td>{{$no++}}</td>
<td>{{$value->name}}</td>
<td>{{$value->email}}</td>
<td>{{$value->salary}}</td>
<td>{{$value->address}}</td>
<td>

<a class="btn btn-primary btn-sm" href="{{route('employees.edit',$value->id)}}" >
<i class="glyphicon glyphicon-pencil"></i>
</a>
</td>
<td>
{!! Form::open(['method'=>'DELETE','route'=>['employees.destroy',$value->id],'style'=>'display:inline']) !!}
<button type="submit" style="display: inline;" class="btn btn-danger btn sm"><i class="glyphicon glyphicon-minus"></i></button>
{!! Form::close() !!}
</td>
</tr>
@endforeach
</table>
</div>
@endsection