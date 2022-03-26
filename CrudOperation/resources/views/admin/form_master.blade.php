
<div class="row">
<div class="col-sm-2" >
{!! Form::label('name', 'Employee Name') !!}
</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
{!! Form::text('name',NULL, ['class'=>'form-control','id'=>'name','placeholder'=>'Enter employee Name']) !!}
{!! $errors->first('name','<p class="help-block">:message</p>') !!}
</div>
</div>

</div>
<div class="row">
<div class="col-sm-2" >
{!! Form::label('mobile', 'Mobile No.') !!}
</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('mobile') ? 'has-error' : '' }}">
{!! Form::number('mobile',NULL, ['class'=>'form-control','id'=>'mobile','placeholder'=>'Enter mobile No.','maxlength'=>10]) !!}
{!! $errors->first('mobile','<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2" >
{!! Form::label('email', 'Email') !!}
</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
{!! Form::text('email',NULL, ['class'=>'form-control','id'=>'email','placeholder'=>'Enter email']) !!}
{!! $errors->first('email','<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-2" >
{!! Form::label('salary', 'Salary') !!}
</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('salary') ? 'has-error' : '' }}">
{!! Form::number('salary',NULL, ['class'=>'form-control','id'=>'salary','placeholder'=>'Enter salary']) !!}
{!! $errors->first('salary','<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2" >
{!! Form::label('address', 'Address') !!}
</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
{!! Form::textarea('address', null, ['id' => 'address', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
{!! $errors->first('address','<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2" >

</div>
<div class="col-sm-5">
<div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
{!! Form::button(isset($employee) ? 'update' : 'save', ['class'=>'btn btn-success','type'=>'Submit']) !!}


</div>
</div>
</div>
