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
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-bonus-tab" data-toggle="pill" href="#custom-content-below-bonus"
                                   role="tab" aria-controls="custom-content-below-bonus" aria-selected="true">
                                    Bonus
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">

                            <div class="tab-pane fade active show" id="custom-content-below-main" role="tabpanel" aria-labelledby="custom-content-below-main-tab">
                                @include('admin.hotel.form.main')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-media" role="tabpanel" aria-labelledby="custom-content-below-media-tab">
                                @include('admin.hotel.form.media')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-location" role="tabpanel" aria-labelledby="custom-content-below-location-tab">
                                @include('admin.hotel.form.location')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-type" role="tabpanel" aria-labelledby="custom-content-below-type-tab">
                                @include('admin.hotel.form.type')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-facility" role="tabpanel" aria-labelledby="custom-content-below-facility-tab">
                                @include('admin.hotel.form.facility')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-surround" role="tabpanel" aria-labelledby="custom-content-below-surround-tab">
                                @include('admin.hotel.form.surround')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-bonus" role="tabpanel" aria-labelledby="custom-content-below-bonus-tab">
                                @include('admin.hotel.form.bonus')
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
                <button type="submit" class="btn btn-success">{{ (isset($hotel->id)) ? 'Update' : 'Save' }}</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">{{ (isset($hotel->id)) ? 'Update' : 'Save' }} & edit</a>
                    <a class="dropdown-item" href="#">{{ (isset($hotel->id)) ? 'Update' : 'Save' }} & new</a>
                </div>
            </div>
        </div>
    </div>
</form>
@php($locationIdSelected = [])
@if(isset($hotel->locations))
    @foreach($hotel->locations as $loc)
        @php(array_push($locationIdSelected, $loc->id))
    @endforeach
@endif
@if(old("locationId"))
    @foreach(old("locationId") as $loc)
        @php(array_push($locationIdSelected, strval($loc)))
    @endforeach
@endif

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/ekko-lightbox.css') }}">
@endpush
@push('js')
    <script type="text/javascript" src="{{ asset('admin/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ekko-lightbox.min.js') }}"></script>
    <script type="text/javascript">
        var arraySelected = {!! json_encode($locationIdSelected) !!};
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
            $('#locationId').select2('val', [arraySelected]);
        });
    </script>
    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endpush
