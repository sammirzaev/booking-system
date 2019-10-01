@extends('admin.layouts.app')

@php(array_push($breadcrumbs, ['item' => 'Create']))

@section('content')
    @include('admin.roomfacility.form')
@endsection