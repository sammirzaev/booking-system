@extends('admin.layouts.app')

@php(array_push($breadcrumbs, ['item' => 'Update']))

@section('content')
    @include('admin.hotelbonus.form')
@endsection