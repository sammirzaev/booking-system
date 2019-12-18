@extends('mail.layouts.app')

@section('metas-head')
    <title>Car Order Created | {{ env('APP_NAME') }}</title>
@endsection

@section('content')
    <h2>Hello {{ $order->user->name }} {{ $order->user->last_name }}!</h2>
    <p>
        <a href="{{ route('user.order.car.index') }}">
            Order # <strong>{{ $order->id }} </strong>
        </a>
        <br />
    </p>

    <div class="invoice p-3 mb-3">

        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                User
                <address>
                    <strong>{{ $order->user->name }}</strong> {{ $order->user->last_name ? $order->user->last_name : '' }}<br>
                    {{ $order->user->detail && $order->user->detail->address ? $order->user->detail->address : '' }}<br>
                    {{ $order->user->detail && $order->user->detail->city ? $order->user->detail->city : '' }}
                    {{ $order->user->detail && $order->user->detail->region ? $order->user->detail->region : '' }}
                    {{ $order->user->detail && $order->user->detail->country ? $order->user->detail->country : '' }}
                    {{ $order->user->detail && $order->user->detail->zip ? $order->user->detail->zip : '' }}<br>
                    Phone: {{ $order->user->detail && $order->user->detail->tel ? $order->user->detail->tel : '' }}<br>
                    Email: {{ $order->user->email ? $order->user->email : '' }}
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                <b>Order created:</b>{{ $order->created_at }}<br>
                <b>Order updated:</b>{{ $order->updated_at }}<br>
                <b>Order Time Start:</b> {{ $order->date_start }}<br>
                <b>Order Time End:</b> {{ $order->date_end }}<br>
                <b>Adults:</b> {{ $order->adults }}<br>
            </div>
            <div class="col-sm-4 invoice-col">
                <b>Invoice #</b><br>
                <br>
                <b>Order ID:</b> {{ $order->id }}<br>
                <b>Payment Due:</b> <br>
                <b>Account:</b>
            </div>
        </div>

        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{config("settings.car_types.{$order->car->type}.title") }}</td>
                        <td>{{ $order->car->title }}</td>
                        <td>{{ config("status.order.car.$order->status.title") }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <p class="lead">Order History:</p>

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                </p>
            </div>
            <div class="col-6">
                <p class="lead">Amount Due </p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${{ $order->price * $order->adults}}</td>
                        </tr>
                        <tr>
                            <th>Deposit:</th>
                            <td>${{ $order->paid ? $order->paid : 0 }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${{ $order->price * $order->adults}}</td>
                        </tr>
                        <tr>
                            <th>Paid:</th>
                            <td>$0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
