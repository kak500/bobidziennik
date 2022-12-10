@extends('layouts.app')
@section('title', 'Lista przedmiotów')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Dodaj przedmiot</h1>
            <form action="/subjectValidate" method="post">
            @csrf
                <input type="text" name="subject_name" id="" placeholder="Wpisz nazwę przedmiotu">
                <input type="submit" value="Dodaj">
            </form> 
        </div>
    </div>
</div>
@endsection
