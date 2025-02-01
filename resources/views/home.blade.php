@extends('layouts.default')

@section('title', 'Home Page')

@section('content')

    <div>
        @include('frontendComponents.heroSection')
    </div>
    <div>
        
        @include('frontendComponents.products')
    </div>



@endsection
