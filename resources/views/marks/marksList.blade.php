@extends('layouts.app')
@section('title', 'Mój panel')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista ocen</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nazwa przedmiotu</th>
                        <th>Ocena</th>
                        <th>Data wpisania</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($marks as $user)
                    <tr>
                        <td>{{$user->subject_name}}</td>
                        <td>{{$user->value}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>
@endsection
