@extends('layouts.app')
@section('content')
<div class="container">
    <button class="btn btn-primary" onclick="window.location.href='/listUsers'">Wyświetl użytkowników</button>
    <button class="btn btn-primary" onclick="window.location.href='/addUser'">Dodaj użytkownika</button>
</div>
@endsection