@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-success">Create</a>
        </div>
    </div>
    <br>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Client
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Type
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Title
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Price/Paid
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Date Start
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Date End
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Created Time
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Status
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($orders) && $orders->isNotempty())
                        @foreach($orders as $order)
                            <tr role="row" class="odd">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{config("settings.car_types.{$order->car->type}.title") }}</td>
                                <td>{{ $order->car->title }}</td>
                                <td>
                                    Price: ${{ $order->price * $order->adults }}
                                    <br>
                                    Paid: ${{ $order->paid ? $order->paid : 0 }}
                                </td>
                                <td>{{ substr($order->date_start, 0, -3) }}</td>
                                <td>{{ substr($order->date_end, 0, -3) }}</td>
                                <td>{{ substr($order->created_at, 0, -3)}}</td>
                                <td>{{ config("status.order.car.$order->status.title") }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-success mr-2" href="{{ route('admin.order.car.edit', $order->id) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Client</th>
                        <th rowspan="1" colspan="1">Type</th>
                        <th rowspan="1" colspan="1">Title</th>
                        <th rowspan="1" colspan="1">Price/Paid</th>
                        <th rowspan="1" colspan="1">Date Start</th>
                        <th rowspan="1" colspan="1">Date End</th>
                        <th rowspan="1" colspan="1">Created Time</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
                    @else
                        <tr>
                            <th rowspan="1" colspan="10">Order list is empty</th>
                        </tr>
                        </tfoot>

                    @endif
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_length" role="status" aria-live="polite">
                    <label>Show
                    <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"
                            onchange="if (this.value) window.location.href=this.value">
                        <option value="{{ route('paginate', ['name' => 'admin.order.car.index', 'value' => 10]) }}"
                                @if(\Request::cookie('admin.order.car.index') === 10) selected @endif>
                           10
                        </option>
                        <option value="{{ route('paginate', ['name' => 'admin.order.car.index', 'value' => 25]) }}"
                                @if(\Request::cookie('admin.order.car.index') === 25) selected @endif>
                            25
                        </option>
                        <option value="{{ route('paginate', ['name' => 'admin.order.car.index', 'value' => 50]) }}"
                                @if(\Request::cookie('admin.order.car.index') === 50) selected @endif>
                            50
                        </option>
                        <option value="{{ route('paginate', ['name' => 'admin.order.car.index', 'value' => 100]) }}"
                                @if(\Request::cookie('admin.order.car.index') === 100) selected @endif>
                            100
                        </option>
                    </select>
                        entries</label>
                </div>
            </div>

            @if($orders->lastPage() > 1)
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            @if($orders->currentPage() !== 1)
                                <li class="paginate_button page-item previous">
                                    <a aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link"
                                       href="{{ $orders->url($orders->currentPage() - 1) }}">&laquo;
                                    </a>
                                </li>
                            @endif
                            @for($i = 1; $i <= $orders->lastPage(); $i++)
                                @if($orders->currentPage() == $i)
                                    <li class="paginate_button page-item active">
                                        <a aria-controls="example2" data-dt-idx="{{ $i }}" tabindex="0" class="page-link"
                                             class="disabled">{{ $i }}
                                        </a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item">
                                        <a aria-controls="example2" data-dt-idx="{{ $i }}" tabindex="0" class="page-link"
                                           href="{{ $orders->url($i) }}">{{ $i }}
                                        </a>
                                    </li>
                                @endif
                            @endfor
                            @if($orders->currentPage() !== $orders->lastPage())
                                <li class="paginate_button page-item next" id="example2_next">
                                    <a  aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link"
                                        href="{{ $orders->url($orders->currentPage() + 1) }}">&raquo;
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
