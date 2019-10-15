@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.hotel.bonus.create') }}" class="btn btn-success">Create</a>
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
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Icon
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Title
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($hotelBonuses) && $hotelBonuses->isNotempty())
                        @foreach($hotelBonuses as $hotelBonus)
                            <tr role="row" class="odd">
                                <td>{{ $hotelBonus->id }}</td>
                                <td><i class="fa fa-{{ $hotelBonus->icon }}"></i></td>
                                <td>
                                    @foreach($hotelBonus->languages as $language)
                                        {{ strtoupper($language->lang) }}: {{ $language->title }} <br/>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-info mr-2" href="#" title="Show"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success mr-2" href="{{ route('admin.hotel.bonus.edit', $hotelBonus) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger mr-2" href="{{ route('admin.hotel.bonus.destroy', ['id' => $hotelBonus->id]) }}" title="Delete"
                                           onclick="event.preventDefault()
                                                   ;if(confirm('Deleted data cannot be returned?')){document.getElementById('hotel-bonus-destroy{{$hotelBonus->id}}').submit();}"
                                        ><i class="fa fa-trash"></i></a>
                                        <form id="hotel-bonus-destroy{{$hotelBonus->id}}" action="{{ route('admin.hotel.bonus.destroy', $hotelBonus) }}" method="POST"
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
                        <th rowspan="1" colspan="1">Icon</th>
                        <th rowspan="1" colspan="1">Title</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
                    @else
                        <tr>
                            <th rowspan="1" colspan="5">Hotel bonus list is empty</th>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection