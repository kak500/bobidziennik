@extends('layouts.app')
@section('title', 'Lista nauczycieli')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista nauczycieli</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($teachers as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>
@endsection