@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <hr/>

            <h1>Общий чат</h1>
            <socket-chat-component></socket-chat-component>

        </div>
    </div>
</div>
@endsection
