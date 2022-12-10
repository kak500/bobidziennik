@extends('layouts.app')
@section('title', 'Dodawanie oceny')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Dodawanie oceny</h1>
            <form action="/addMark" method="post" class="validated-form">
            @csrf
            <div class="form-group">
                <select name="student" id="mark_value" class="">
                    <option selected="true" disabled="disabled">Wybierz ucznia</option>
                    @foreach ($students as $student)
                        <option value={{ $student->id }}>{{ $student->name }} {{ $student->surname }}</option>
                    @endforeach
                </select>
                @error('student')
                <div class="validate-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="subject" id="mark_value" class="">
                    <option selected="true" disabled="disabled">Wybierz przedmiot</option>
                    @foreach ($subjects as $subject)
                        <option value={{ $subject->id }}>{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
                <div class="validate-error">
                @error('subject')
                    {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <select name="value" id="mark_value" class="">
                    <option selected="true" disabled="disabled">Wybierz ocenę</option>
                    @for ($i = 1; $i <= 6; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                <div class="validate-error">
                @error('value')
                    {{ $message }}
                @enderror
                </div>
            </div>
            <input type="submit" value="Dodaj ocenę">
        </form>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        </div>
    </div>
</div>
@endsection