@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <table-prop-component :url-data="{{json_encode($dataUrls)}}"></table-prop-component>

                <hr>
                <h2>ajax component</h2>

                <table-ajax-component></table-ajax-component>
            </div>
        </div>
    </div>
@endsection
