@extends('layouts.app')

@section('title', 'Lista uczniów')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1><strong>Uczeń: {{$student->name}} {{$student->surname}}</strong></h1>
        <h2>Mail: <a href="mailto:{{$student->email}}">{{$student->email}}</a></p>
        <h2>Lista ocen</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nazwa przedmiotu</th>
                        <th>Ocena</th>
                        <th>Data wpisania</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($marks as $mark)
                    <tr>
                        <td>{{$mark->subject_name}}</td>
                        <td>{{$mark->value}}</td>
                        <td>{{$mark->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection