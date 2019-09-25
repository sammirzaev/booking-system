@extends('admin.layouts.app')

@php(array_push($breadcrumbs, ['item' => 'Update']))

@section('content')
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <fieldset disabled>
                    <div class="row">
                        <div class="col-4">
                            <label class="required" for="code">Location Code</label>
                            <input type="text" name="code" id="code" class="form-control"
                                   value="{{ isset($location->code) ? $location->code : '' }}"
                                   max="3" minlength="2" >
                        </div>

                        <div class="col-sm-4">
                            <!-- select -->
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value=""
                                            @if(!isset($location->parent_id) || !old('parent'))
                                            selected
                                            @endif
                                    >No parent
                                    </option>
                                    @if(isset($locations) && $locations->isNotEmpty())
                                        @foreach($locations as $item)
                                            <option value="{{ $item->id }}"
                                                    @if((isset($location->parent_id) && $location->parent_id == $item->id) || ($item->id == old('parent')))
                                                    selected
                                                    @endif
                                            >{{ $item->language->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach(config('settings.locales') as $locale)
                            <div class="col-4">
                                <label class="required" for="title[{{ $locale }}]">Title {{ strtoupper($locale) }}</label>
                                <input type="text" name="title[{{ $locale }}]" id="title[{{ $locale }}]" class="form-control"
                                       value="{{ (isset($location) && $location->languages->where('code', $locale)) ? current(current($location->languages->where('lang', $locale)))->title : '' }}">
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="form-control"
                                   value="{{ isset($location->latitude) ? $location->latitude : '' }}">
                        </div>
                        <div class="col-4">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="form-control"
                                   value="{{ isset($location->longitude) ? $location->longitude : '' }}">
                        </div>
                    </div>
                    <hr>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="btn-group float-right">
                <a href="{{ route('admin.location.edit', $location) }}" class="btn btn-success">Edit</a>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="{{ route('admin.location.edit', $location) }}">Delete</a>
                    <form id="location-destroy" action="{{ route('admin.location.destroy', $location) }}" method="POST"
                          style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

