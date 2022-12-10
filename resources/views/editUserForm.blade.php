@extends('layouts.app')

@section('title', 'Lista uczniów')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2>Edycja użytkownika</h2>
<!-- {{$user}} -->
<form action="/editUserController/{{$user[0]->id}}" method="post" class="userForm">
    @csrf
    <input type="text" name="name" placeholder="Podaj imię" value="{{$user[0]->name}}">
    @error('name')
        {{ $message }}
    @enderror
    <input type="text" name="surname" placeholder="Podaj nazwisko" value="{{$user[0]->surname}}"/>
    @error('surname')
        {{ $message }}
    @enderror
    <input type="password" name="password" placeholder="Podaj hasło"/>
    @error('password')
        {{ $message }}
    @enderror
    <input type="text" name="email" placeholder="Podaj email" value="{{$user[0]->email}}">
    @error('email')
        {{ $message }}
    @enderror
    <select name="role">
        <option value="{{$user[0]->role_id}}" selected>{{$user[0]->role_name}}</option>
    </select>
    <input type="submit" value="Edytuj użytkownika">
</form>
        </div>
    </div>
</div>
@endsection