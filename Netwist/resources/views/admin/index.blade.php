@extends('layouts.app')
@section('content')
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<div align="center">
<h1>City Details</h1>
<p>&nbsp;</p>

<div>
<a href="cities/create">Add City</a>
<p>&nbsp;</p>
<table width="70%" border="1" style="border-collapse: collapse;">
<tr>
<th>Sno</th>
<th>City Name</th>
<th>State Name</th>
<th colspan="2">Action</th>
</tr>
<?php $sno=0;?>
@foreach($city as $city_detail)
<tr>
<td>{{++$sno}}</td>
<td>{{$city_detail->city_name}}</td>
<td>{{$city_detail->state->state_name}}</td>
<td><a href="cities/{{$city_detail->id}}/edit">Edit</a></td>
<td><input type="button" onclick="delete_details({{$city_detail->id}})" value="Delete"></td>

</tr>
@endforeach
</table>
</div>
</div>

<script>

function delete_details(id){
var x=confirm("Do you want to delete city Details");
if(x){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "cities/"+id,
        type: 'DELETE', 
        dataType: "JSON",
        data: {
            "id": id 
        },
        success: function (response)
        {
            alert("City Deleted Succesfully")
            location.reload()
        },
        error: function(xhr) {
         console.log(xhr); // this line will save you tons of hours while debugging
        // do something here because of error
       }
    });




}
}

</script>
@endsection