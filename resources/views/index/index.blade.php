@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('reservation')
    @include('layouts.reservation.widget')
@endsection

@section('content')

    @include('index.services')

    @include('index.popular_destination')

    @include('index.blog')

    @include('index.sale')

    @include('index.recommended_hotel')

    @include('index.comment')

    @include('index.popular_side')

@endsection