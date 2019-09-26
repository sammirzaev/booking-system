<form action="{{ (isset($hotel->id)) ? route('admin.hotel.update', $hotel) : route('admin.hotel.store') }}"
      method="post" enctype="multipart/form-data">
    @csrf
    @isset($hotel->id)
        @method('put')
    @endisset
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link required active" id="custom-content-below-main-tab" data-toggle="pill" href="#custom-content-below-main"
                                   role="tab" aria-controls="custom-content-below-main" aria-selected="true">
                                    Main
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link required " id="custom-content-below-media-tab" data-toggle="pill" href="#custom-content-below-media"
                                   role="tab" aria-controls="custom-content-below-media" aria-selected="false">
                                    Media
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link required " id="custom-content-below-location-tab" data-toggle="pill" href="#custom-content-below-location"
                                   role="tab" aria-controls="custom-content-below-location" aria-selected="false">
                                    Location
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-type-tab" data-toggle="pill" href="#custom-content-below-type"
                                   role="tab" aria-controls="custom-content-below-type" aria-selected="false">
                                    Type
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-facility-tab" data-toggle="pill" href="#custom-content-below-facility"
                                   role="tab" aria-controls="custom-content-below-facility" aria-selected="false">
                                    Facility
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-surround-tab" data-toggle="pill" href="#custom-content-below-surround"
                                   role="tab" aria-controls="custom-content-below-surround" aria-selected="true">
                                    Surround
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">

                            <div class="tab-pane fade active show" id="custom-content-below-main" role="tabpanel" aria-labelledby="custom-content-below-main-tab">
                                @foreach(config('settings.locales') as $locale)
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <label class="required" for="mainTitle[{{ $locale }}]">
                                                Name {{ strtoupper($locale) }}
                                            </label>
                                            <input class="form-control" type="text" name="mainTitle[{{ $locale }}]"
                                                   placeholder="Enter Hotel Name" id="mainTitle[{{ $locale }}]">
                                        </div>
                                        <div class="col-6">
                                            <label class="required" for="mainAddress[{{ $locale }}]">
                                                Address {{ strtoupper($locale) }}
                                            </label>
                                            <input class="form-control" type="text" name="mainAddress[{{ $locale }}]"
                                                   placeholder="Enter Hotel Address" id="mainAddress[{{ $locale }}]">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label class="required" for="mainDescription[{{ $locale }}]">
                                                Description {{ strtoupper($locale) }}
                                            </label>
                                            <textarea class="form-control" name="mainDescription[{{ $locale }}]" rows="5"
                                                 id="mainDescription[{{ $locale }}]">Enter Hotel Description {{ strtoupper($locale) }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="mainStar">Star</label>
                                        <input type="number" class="form-control" name="mainStar"
                                               min="1" max="5" id="mainStar">
                                    </div>
                                    <div class="col-4">
                                        <label for="mainSort">Sort</label>
                                        <input type="number" class="form-control" name="mainSort"
                                               min="1" id="mainSort">
                                    </div>
                                    <div class="col-4">
                                        <label class="required" for="mainStatus">Status</label>
                                        <select name="mainStatus" id="mainStatus" class="select2" data-placeholder="Select a Status">
                                            @foreach(config('status.hotel') as $key => $status)
                                                <option value="{{ $key }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="mainCheckin">Checkin Time</label>
                                        <input type="text" class="form-control" name="mainCheckin" id="mainCheckin">
                                    </div>
                                    <div class="col-4">
                                        <label for="mainCheckout">Checkout Time</label>
                                        <input type="text" class="form-control" name="mainCheckout" id="mainCheckout">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label class="required" for="mainPriceFrom">Price From</label>
                                        <input type="text" class="form-control" name="mainPriceFrom" id="mainPriceFrom">
                                    </div>
                                    <div class="col-4">
                                        <label for="mainPriceTo">Price To</label>
                                        <input type="text" class="form-control" name="mainPriceTo" id="mainPriceTo">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-media" role="tabpanel" aria-labelledby="custom-content-below-media-tab">
                                <div class="row mt-4">
                                    <input type="file" name="mediaUploaded[]" multiple="">

                                    <media-upload></media-upload>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-location" role="tabpanel" aria-labelledby="custom-content-below-location-tab">
                                <div class="row mt-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="required" for="locationId">Object Location</label>
                                            <select name="locationId" id="locationId" data-placeholder="Select a Locations"
                                                    class="select2 @error('locationId') is-invalid @enderror" required multiple="multiple" style="width: 100%;">
                                                @if(isset($locations) && $locations->isNotEmpty())
                                                    @include('admin.location.child', ['items' => $locations->where('parent_id', null)->sortBy('sort'), 'parent' => ''])
                                                @endif
                                            </select>
                                            @error('locationId')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="locationLatitude">Latitude</label>
                                        <input type="text" name="locationLatitude" id="locationLatitude" class="form-control @error('locationLatitude') is-invalid @enderror"
                                               placeholder="Enter latitude" value="{{ isset($location->latitude) ? $location->latitude : old('locationLatitude') }}">
                                        @error('locationLatitude')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="locationLongitude">Longitude</label>
                                        <input type="text" name="locationLongitude" id="locationLongitude" class="form-control @error('locationLongitude') is-invalid @enderror"
                                               placeholder="Enter longitude" value="{{ isset($location->longitude) ? $location->longitude : old('locationLongitude') }}">
                                        @error('locationLongitude')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-type" role="tabpanel" aria-labelledby="custom-content-below-type-tab">
                                <div class="row mt-4">
                                    @if(isset($hotelTypes) && $hotelTypes->isNotEmpty())
                                        @foreach($hotelTypes as $hotelType)
                                        <div class="col-sm-3">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" name="hotelTypes[{{ $hotelType->id }}]" id="hotelTypes{{ $hotelType->id }}">
                                                    <label for="hotelTypes{{ $hotelType->id }}">
                                                        {{ $hotelType->language->title }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-facility" role="tabpanel" aria-labelledby="custom-content-below-facility-tab">
                                <div class="row mt-4">

                                    @if(isset($hotelFacilities) && $hotelFacilities->isNotEmpty())
                                        @include('admin.hotel.child-facility', ['items' => $hotelFacilities->where('parent_id', null)->sortBy('sort')])
                                    @endif

                                    @error('facilities')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-surround" role="tabpanel" aria-labelledby="custom-content-below-surround-tab">
                                @if(isset($hotelSurrounds) && $hotelSurrounds->isNotEmpty())
                                    @foreach($hotelSurrounds->sortBy('sort') as $hotelSurround)
                                        <div class="row">
                                            <div class="col-12">
                                                <i class="fa fa-{{ $hotelSurround->icon }}"></i><h4>{{ $hotelSurround->language->title }}</h4>
                                            </div>
                                            <div class="col-6">
                                                <label for="hotelSurroundsName{{ $hotelSurround->id }}">
                                                    Name
                                                </label>
                                                <input class="form-control" type="text" name="hotelSurroundsName[{{ $hotelSurround->id }}]"
                                                       placeholder="Enter Surround Name" id="hotelSurroundsName{{ $hotelSurround->id }}">
                                            </div>
                                            <div class="col-6">
                                                <label for="hotelSurroundsDistance{{ $hotelSurround->id }}">
                                                    Distance
                                                </label>
                                                <input class="form-control" type="text" name="hotelSurroundsDistance[{{ $hotelSurround->id }}]"
                                                       placeholder="Enter Surround Distance" id="hotelSurroundsDistance{{ $hotelSurround->id }}">
                                            </div>
                                            <div class="col-6">
                                                <label for="hotelSurroundsLatitude">Latitude</label>
                                                <input type="text" name="hotelSurroundsLatitude" id="hotelSurroundsLatitude"
                                                       class="form-control @error('latitude') is-invalid @enderror"
                                                       placeholder="Enter Surround latitude" value="">

                                            </div>
                                            <div class="col-6">
                                                <label for="hotelSurroundsLongitude">Longitude</label>
                                                <input type="text" name="hotelSurroundsLongitude" id="hotelSurroundsLongitude"
                                                       class="form-control @error('longitude') is-invalid @enderror"
                                                       placeholder="Enter Surround longitude" value="">
                                            </div>

                                        </div>
                                        <hr>
                                    @endforeach
                                @endif
                            </div>

                        </div>

                        <div class="tab-custom-content mt-4">
                            <p class="float-right"><span class="required"></span> - required filling fields.</p>
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

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2-bootstrap4.min.css') }}">
@endpush
@push('js')
    <script type="text/javascript" src="{{ asset('admin/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endpush