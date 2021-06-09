@extends('layouts.app')
@section('content')

<div class="container border p-3 mt-3">
<form action="/login" method="post">
@csrf
  <div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input name="login" type="text" class="form-control" id="login" aria-describedby="loginHelp">
    <div id="loginHelp" class="form-text">Your DirectAdmin login</div>
  </div>
  <div class="mb-3">
    <label for="InputPassword1" class="form-label">Password</label>
    <input name="passwd" type="password" class="form-control" id="InputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection