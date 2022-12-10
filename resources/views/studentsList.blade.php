@extends('layouts.app')

@section('title', 'Lista uczniów')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista uczniów</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                
                    <tr>
                    
                        <td><a href="student-profile/{{$student->id}}">{{$student->name}}</a></td>
                        <td>{{$student->surname}}</td>
                        <td>{{$student->email}}</td>
                        </a>
                    </tr>
                
                @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>
@endsection