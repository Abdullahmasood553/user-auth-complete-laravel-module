@extends('layouts.master')
@include('layouts.inc.nav')

@section('content')

    <div class="container mt-4">
        <h3>Welcome {{ Auth::user()->fname }}</h3>
    </div>

@endsection



