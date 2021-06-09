@extends('layouts.app')
@section('content')
<div class="container">
    @isset($message)
    <div>{{$message}}</div>
    @endisset
<div class="container border p-3 mt-3">
    <div >
        <h1>Create user</h1>
    </div>
    <form action="/addUser" method="post">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="username" aria-describedby="username">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="domain" class="form-label">Domain</label>
            <input name="domain" type="text" class="form-control" id="domain">
        </div>
        <div class="mb-3">
            <label for="passwd" class="form-label">Password</label>
            <input name="passwd" type="password" class="form-control" id="passwd">
        </div>
        <div class="mb-3">
            <label for="passwd2" class="form-label">Repeat password</label>
            <input name="passwd2" type="password" class="form-control" id="passwd2">
        </div>
        <div class="mb-3">
            <label for="ip" class="form-label">IP</label>
            <input name="ip" type="text" class="form-control" id="ip">
        </div>
        <div class="mb-3">
            <label for="package" class="form-label">Package</label>
            <select class="form-select" id="package" name="package">
                @foreach ($packages as $package)
                <option> {{$package}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection