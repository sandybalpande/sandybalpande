
@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Download Page</div>

                <div class="panel-body">
                    <!-- <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }} -->

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<?php
                          
							foreach (glob(public_path()."/*.pdf") as $filename) {
						           $filename = basename($filename);
							echo "<button type='submit' class='btn btn-primary download' filename=".$filename.">Download</button>";
							// do something with $filename
							}
							?>
                                
                            </div>
                        </div>
                <!--     </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $(".download").click(function(){
  filename= $(this).attr("filename")
  $.ajax({
        url: "downloadFile/"+filename,
        type: 'get', 
        dataType: "JSON",
        data: {
            "filename": filename 
        },
        success: function (response)
        {
          //  alert("City Deleted Succesfully")
            location.reload()
        },
        error: function(xhr) {
        	//alert(xhr)
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
       }
    });
  });
});
</script>
@endsection