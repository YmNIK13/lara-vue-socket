@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (Auth::check())
                    <h1>Приватный чат. {{$user->email}}</h1>
                    <chat-private-socket-component :users="{{$users}}" :owner="{{$user}}"></chat-private-socket-component>

                    <hr/>
                @endif

                <h1>Общий чат</h1>
                <chat-socket-component></chat-socket-component>

            </div>
        </div>
    </div>
@endsection
