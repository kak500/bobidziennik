@extends('layouts.app')
@section('title', 'Lista przedmiotów')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista przedmiotów</h1>
            <a href="add-subject">Dodaj przedmiot</a>
            <form action="/subjectValidate" method="post">
            @csrf
                <input type="text" name="subject_name" id="" placeholder="Wpisz nazwę przedmiotu">
                <input type="submit" value="Dodaj">
            </form> 
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Nazwa przedmiotu</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($subjects as $user)
                    <tr>
                        <td>{{$user->subject_name}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>
@endsection
