@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <hr/>

            <h1>Общий чат</h1>
            <chat-socket-component></chat-socket-component>

        </div>
    </div>
</div>
@endsection
