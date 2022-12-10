@extends('layouts.app')

@section('title', 'Lista użytkowników')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>Użytkownicy</h2>
        <a href="/studentAdd" class="table-btn">Dodaj użytkownika <i class="fa-solid fa-user-plus"></i></a>
<table class="table">
    <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Rola</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role_name}}</td>
            <td><a href="/editUser/{{$user->id}}"><i class="fa-solid fa-pen"></i> Edytuj</a></td>
            <td><a href="/delUser/{{$user->id}}"><i class="fa-solid fa-trash"></i> Usuń</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
        </div>
    </div>
<!-- @foreach($users as $user)
<p>Imię: {{$user->name}}</p>

@endforeach -->