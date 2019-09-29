@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.hotel.create') }}" class="btn btn-success">Create</a>
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
                            aria-label="Browser: activate to sort column ascending">Hotel
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Price
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Time
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Geolocation
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Status
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
                    @if(isset($hotels) && $hotels->isNotempty())
                        @foreach($hotels as $hotel)
                            <tr role="row" class="odd">
                                <td>{{ $hotel->id }}</td>
                                <td>{{ $hotel->language->title }}</td>
                                <td>Price From: {{ $hotel->price_from ? $hotel->price_from : '' }}
                                    <br>Price to: {{ $hotel->price_to ? $hotel->price_to : '' }}
                                </td>
                                <td>Checkin: {{ $hotel->check_in ? $hotel->check_in : '' }}
                                    <br>Checkout: {{ $hotel->check_out ? $hotel->check_out : '' }}
                                </td>
                                <td>Latitude: {{ $hotel->latitude ? $hotel->latitude : '' }}
                                    <br>Longitude: {{ $hotel->longitude ? $hotel->longitude : '' }}
                                </td>
                                <td>{{ config("status.hotel.$hotel->status") }}</td>
                                <td>{{ $hotel->sort }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-info mr-2" href="#" title="Show"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success mr-2" href="{{ route('admin.hotel.edit', $hotel) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger mr-2" href="{{ route('admin.hotel.destroy', ['id' => $hotel->id]) }}" title="Delete"
                                           onclick="event.preventDefault()
                                                   ;if(confirm('Deleted data cannot be returned?')){document.getElementById('hotel-destroy{{$hotel->id}}').submit();}"
                                        ><i class="fa fa-trash"></i></a>
                                        <form id="hotel-destroy{{$hotel->id}}" action="{{ route('admin.hotel.destroy', $hotel) }}" method="POST"
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
                        <th rowspan="1" colspan="1">Hotel</th>
                        <th rowspan="1" colspan="1">Price</th>
                        <th rowspan="1" colspan="1">Time</th>
                        <th rowspan="1" colspan="1">Geolocation</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Sort</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
                    @else
                        <tr>
                            <th rowspan="1" colspan="8">Hotel list is empty</th>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection