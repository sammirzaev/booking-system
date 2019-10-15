@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create</a>
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
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Role
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Email
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Telephone
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Details
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($users) && $users->isNotempty())
                        @foreach($users as $user)
                            <tr role="row" class="odd">
                                <td>{{ $user->id }}</td>
                                <td>
                                    @if($user->roles->isNotEmpty())
                                        @foreach($user->roles as $role)
                                            {{ ucfirst($role->name) }}
                                        @endforeach
                                    @else
                                        User
                                    @endif
                                </td>
                                <td><b>{{ $user->name }}</b>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ isset($user->detail->tel) ? $user->detail->tel : '' }}</td>
                                <td>
                                    Country: {{ isset($user->detail->country) ? $user->detail->country : '' }} <br/>
                                    Region: {{ isset($user->detail->region) ? $user->detail->region : '' }} <br/>
                                    City: {{ isset($user->detail->city ) ? $user->detail->city : '' }} <br/>
                                    Address: {{ isset($user->detail->address) ? $user->detail->address : '' }} <br/>
                                    Post code: {{ isset($user->detail->zip) ? $user->detail->zip : '' }} <br/>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-info mr-2" href="#" title="Show"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success mr-2" href="{{ route('admin.user.edit', $user) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger mr-2" href="{{ route('admin.user.destroy', ['id' => $user->id]) }}" title="Delete"
                                           onclick="event.preventDefault()
                                                   ;if(confirm('Deleted user cannot be returned?')){document.getElementById('user-destroy{{$user->id}}').submit();}"
                                        ><i class="fa fa-trash"></i></a>
                                        <form id="user-destroy{{$user->id}}" action="{{ route('admin.user.destroy', $user) }}" method="POST"
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
                        <th rowspan="1" colspan="1">Role</th>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Email</th>
                        <th rowspan="1" colspan="1">Telephone</th>
                        <th rowspan="1" colspan="1">Detail</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
                    @else
                        <tr>
                            <th rowspan="1" colspan="6">Users list is empty</th>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection