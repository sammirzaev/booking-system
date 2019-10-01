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
            <div class="col-sm-12">
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
                            aria-label="Engine version: activate to sort column ascending">Price / Payment Type
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Client</th>
                        <th rowspan="1" colspan="1">Type</th>
                        <th rowspan="1" colspan="1">Title</th>
                        <th rowspan="1" colspan="1">Price / Payment Type</th>
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
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 col-md-5">--}}
{{--                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-12 col-md-7">--}}
{{--                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="paginate_button page-item previous disabled" id="example2_previous">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item active">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item ">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item ">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item ">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item ">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item ">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>--}}
{{--                        </li>--}}
{{--                        <li class="paginate_button page-item next" id="example2_next">--}}
{{--                            <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection