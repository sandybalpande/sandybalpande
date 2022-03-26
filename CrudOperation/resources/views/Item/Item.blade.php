@extends('layouts.app')
@section('content')
<div class="container">
<div class="row pull-rigth">
<div class="col-sm-12">
<div>

<b>Add Item Menu
</b>
<p>&nbsp;</p>
</div>
</div>
</div>
<div class="row">
<form action="addItemMenu" method="post">
{{csrf_field()}}
<div class="row">
<div class="col-sm-2" >
<label><b>Item Name</b></label>
</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
<input type="text" name="name">

</div>
</div>
</div>
<div class="row">
<div class="col-sm-2" >
</div>
<div class="col-sm-5">

<input type="submit" class="btn btn-primary" value="Add Item">

</div>
</div>
</div>

</form>
</div>
</div>
@endsection