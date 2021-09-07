@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <hr/>

            <h2>Socket</h2>
            <socket-component></socket-component>

            <hr/>

            <h2>Динамический</h2>
            <chart-line-dynamic-component></chart-line-dynamic-component>


            <hr/>

            <h2>круговая</h2>
            <chart-pie-component></chart-pie-component>

            <hr/>

            <h2>Линейный</h2>
            <chart-line-component></chart-line-component>

        </div>
    </div>
</div>
@endsection
