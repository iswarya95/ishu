@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
 <div class="col-md-8 col-md-offset-2">
 <div class="panel panel-default">
 <div class="panel-heading">Reset Password</div>
 <div class="panel-body">
 

  <form class="form-horizontal" role="form" method="POST" action="{{ url('user/password/reset/'.$token) }}"> 
  <input type="hidden" name="email" value="{{$email}}">
{{ csrf_field() }}
<div class="form-group">
<label class="col-md-4 control-label">New Password</label>
<div class="col-md-6">
<input type="password" class="form-control" name="password"> 
</div>
 {!!$errors->first('password','<span>:message</span>')!!}
 </div>

 <div class="form-group">
 <label class="col-md-4 control-label">Confirm Password</label>
 <div class="col-md-6">
 <input type="password" class="form-control" name="password_confirmation">
 </div>
 {!!$errors->first('password_confirmation','<span>:message</span>')!!}
  </div>

 <div class="form-group">
 <div class="col-md-6 col-md-offset-4">
 <button type="submit" class="btn btn-primary">
                                    SUBMIT
                                </button>
 </div>
 </div>
</form>
 </div>
 </div>
 </div>
 </div>
</div>

@endsection