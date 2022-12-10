@extends('layouts.app')

@section('title', 'Lista uczniów')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2>Dodawanie użytkownika</h2>
<form action="/addStudent" method="post" class="validated-form">
    @csrf
    <div class="form-group">
        <input type="text" name="name" placeholder="Podaj imię"/>
        <div class="validate-error">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <input type="text" name="surname" placeholder="Podaj nazwisko"/>
        <div class="validate-error">
            @error('surname')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Podaj hasło"/>
        <div class="validate-error">
            @error('password')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <input type="text" name="email" placeholder="Podaj email"/>
        <div class="validate-error">
            @error('email')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <select name="role">
        <option selected="true" disabled="disabled">Wybierz rolę</option>
            @foreach ($roles as $role)
            <option value={{$role->id}}>{{$role->role_name}}</option>
            @endforeach
        </select>
        <div class="validate-error">
            @error('role')
                {{ $message }}
            @enderror
        </div>
    </div>
    <input type="submit" value="Dodaj użytkownika">
</form>
        </div>
    </div>
</div>
@endsection