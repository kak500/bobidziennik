@extends('layouts.app')
@section('title', 'Mój panel')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Witaj {{Auth::user()->name}} {{Auth::user()->surname}}</h2>
                </div>
            
                <div id="marks">
                    <h2>Twoje najnowsze oceny</h2>
                    <table class="table col-md-8">
                    <thead>
                        <tr>
                            <th>Nazwa przedmiotu</th>
                            <th>Ocena</th>
                            <th>Data wpisania</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($marks as $user)
                        @if($loop->first)
                        <tr class="highlight bg-warning">
                            <td>{{$user->subject_name}}</td>
                            <td>{{$user->value}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{$user->subject_name}}</td>
                            <td>{{$user->value}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>    
            </div>
        
        </div>
    </div>
    </div>
</div>
@endsection
