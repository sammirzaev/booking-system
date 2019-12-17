@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div id="colorlib-about">
        <div class="container">
            <div class="row">
                <div class="about-flex">

                    @include('layouts.sidebar')

                    <div class="col-three-forth animate-box">
                        <h2>{{ __('order-car/index.car_orders') }}</h2>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="example2" class="table table-bordered table-hover dataTable " role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">{{ __('order-car/index.type') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">{{ __('order-car/index.title') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">{{ __('order-car/index.price') }}/{{ __('order-car/index.paid') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">{{ __('order-car/index.date_start') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">{{ __('order-car/index.date_end') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">{{ __('order-car/index.created') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">{{ __('order-car/index.status') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">{{ __('order-car/index.action') }}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($orders) && $orders->isNotempty())
                                        @foreach($orders as $order)
                                            <tr role="row" class="odd">
                                                <td>{{ $order->id }}</td>
                                                <td>{{config("settings.car_types.{$order->car->type}.title") }}</td>
                                                <td>{{ $order->car->title }}</td>
                                                <td>
                                                    {{ __('order-car/index.price') }}: ${{ $order->price * $order->adults }}
                                                    <br>
                                                    {{ __('order-car/index.paid') }}: ${{ $order->paid ? $order->paid : 0 }}
                                                </td>
                                                <td>{{ substr($order->date_start, 0, -3) }}</td>
                                                <td>{{ substr($order->date_end, 0, -3) }}</td>
                                                <td>{{ substr($order->created_at, 0, -3)}}</td>
                                                <td>{{ config("status.order.car.$order->status.title") }}</td>
                                                <td>
                                                    @if($order->status === 1 || $order->status === 2)
                                                        <div class="btn-group btn-group-sm">
                                                            <a class="btn btn-danger mr-2" href="{{ route('car.checkout.destroy', ['id' => $order->id]) }}" title="Cancel"
                                                               onclick="event.preventDefault()
                                                                       ;if(confirm('{{ __('order-car/index.confirm') }}')){document.getElementById('order-cancel{{$order->id}}').submit();}"
                                                            ><i class="fa fa-trash"></i></a>
                                                            <form id="order-cancel{{$order->id}}" action="{{ route('car.checkout.destroy', $order) }}" method="POST"
                                                                  style="display: none;">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">#</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.type') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.title') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.price') }}/{{ __('order-car/index.paid') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.date_start') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.date_end') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.created') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.status') }}</th>
                                        <th rowspan="1" colspan="1">{{ __('order-car/index.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    @else
                                        <tr>
                                            <th rowspan="1" colspan="9">{{ __('order-car/index.no_orders') }}</th>
                                        </tr>
                                        </tfoot>

                                    @endif
                                </table>
                            </div>
                        </div>
                        @if($orders->lastPage() > 1)
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <ul class="pagination">
                                        @if($orders->currentPage() !== 1)
                                            <li>
                                                <a href="{{ $orders->url($orders->currentPage() - 1) }}">&laquo;
                                                </a>
                                            </li>
                                        @endif
                                        @for($i = 1; $i <= $orders->lastPage(); $i++)
                                            @if($orders->currentPage() == $i)
                                                <li class="active "><a class="disabled">{{ $i }}</a></li>
                                            @else
                                                <li><a href="{{ $orders->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                        @endfor
                                        @if($orders->currentPage() !== $orders->lastPage())
                                            <li>
                                                <a href="{{ $orders->url($orders->currentPage() + 1) }}">&raquo;
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('index.comment')
@endsection
