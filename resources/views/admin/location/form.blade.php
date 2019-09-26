<form action="{{ (isset($location->id)) ? route('admin.location.update', $location) : route('admin.location.store') }}"
      method="post" enctype="multipart/form-data">
    @csrf
    @isset($location->id)
        @method('put')
    @endisset
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label class="required" for="code">Location Code</label>
                            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                   placeholder="{{ strtoupper(config('settings.locale_default')) }}"
                                   value="{{ isset($location->code) ? $location->code : old('code') }}"
                                   max="3" minlength="2" required>
                            @error('code')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <!-- select -->
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" id="parent" class="form-control @error('parent') is-invalid @enderror">
                                    <option value=""
                                            @if(!isset($location->parent_id) || !old('parent'))
                                            selected
                                            @endif
                                    >No parent
                                    </option>
                                    @if(isset($locations) && $locations->isNotEmpty())
                                        @include('admin.location.child', ['items' => $locations->where('parent_id', null)->sortBy('sort'), 'parent' => ''])
                                    @endif
                                </select>
                                @error('parent')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="sort">Sort</label>
                            <input type="number" name="sort" id="sort" class="form-control @error("sort") is-invalid @enderror"
                                   value="{{ ((isset($location) && $location->sort) ? $location->sort : old("sort")) ?? 1 }}"
                                   required min="1" >
                            @error('sort')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach(config('settings.locales') as $locale)
                            <div class="col-4">
                                <label class="required" for="title[{{ $locale }}]">Title {{ strtoupper($locale) }}</label>
                                <input type="text" name="title[{{ $locale }}]" id="title[{{ $locale }}]" class="form-control @error("title.$locale") is-invalid @enderror"
                                       placeholder="Enter title {{ strtoupper($locale) }}"
                                       value="{{ (isset($location) && isset(current(current($location->languages->where('lang', $locale)))->title)) ?
                                       current(current($location->languages->where('lang', $locale)))->title : old("title.$locale") }}"
                                required>
                                @error("title.$locale")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror"
                                   placeholder="Enter latitude" value="{{ isset($location->latitude) ? $location->latitude : old('latitude') }}">
                            @error('latitude')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror"
                                   placeholder="Enter longitude" value="{{ isset($location->longitude) ? $location->longitude : old('longitude') }}">
                            @error('longitude')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="float-right"><span class="required"></span> - required filling fields.</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="btn-group float-right">
                <button type="submit" class="btn btn-success">{{ (isset($location->id)) ? 'Update' : 'Save' }}</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">{{ (isset($location->id)) ? 'Update' : 'Save' }} & edit</a>
                    <a class="dropdown-item" href="#">{{ (isset($location->id)) ? 'Update' : 'Save' }} & new</a>
                </div>
            </div>
        </div>
    </div>
</form>