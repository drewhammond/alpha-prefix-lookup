@extends('layouts.global')

@section('content')

        <div class="container">
            <div class="page-header text-center">
                <h1>BCBS Alpha Prefix Lookup</h1>
            </div>
        </div>

    <div id="app">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <search-component></search-component>
            </div>
        </div>

    </div>

@endsection