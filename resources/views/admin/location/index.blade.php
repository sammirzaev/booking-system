@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.location.create') }}" class="btn btn-success">Create</a>
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
                            aria-label="Browser: activate to sort column ascending">Code
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Parent
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Title
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Geolocation
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Sort
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($locations) && $locations->isNotempty())
                        @foreach($locations as $location)
                            <tr role="row" class="odd">
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->code }}</td>
                                <td>
                                    {{ $location->parent_id }}
                                </td>
                                <td>
                                    @foreach($location->languages as $language)
                                        {{ strtoupper($language->lang) }}: {{ $language->title }} <br/>
                                    @endforeach
                                </td>
                                <td>Latitude: {{ $location->latitude ? $location->latitude : '' }}
                                    <br>Longitude: {{ $location->longitude ? $location->longitude : '' }}
                                </td>
                                <td>{{ $location->sort }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-info mr-2" href="{{ route('admin.location.show', $location) }}" title="Show"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success mr-2" href="{{ route('admin.location.edit', $location) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger mr-2" href="{{ route('admin.location.destroy', ['id' => $location->id]) }}" title="Delete"
                                           onclick="event.preventDefault()
                                                   ;if(confirm('Deleted data cannot be returned?')){document.getElementById('location-destroy{{$location->id}}').submit();}"
                                        ><i class="fa fa-trash"></i></a>
                                        <form id="location-destroy{{$location->id}}" action="{{ route('admin.location.destroy', $location) }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Code</th>
                        <th rowspan="1" colspan="1">Parent</th>
                        <th rowspan="1" colspan="1">Title</th>
                        <th rowspan="1" colspan="1">Geolocation</th>
                        <th rowspan="1" colspan="1">Sort</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
                    @else
                        <tr>
                            <th rowspan="1" colspan="7">Location list is empty</th>
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