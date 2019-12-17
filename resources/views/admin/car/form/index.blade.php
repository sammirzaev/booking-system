{{--@dd($errors)--}}
<form action="{{ (isset($car->id)) ? route('admin.car.update', $car) : route('admin.car.store') }}"
      method="post" enctype="multipart/form-data">
    @csrf
    @isset($car->id)
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
                                <a class="nav-link required " id="custom-content-below-detail-tab" data-toggle="pill" href="#custom-content-below-detail"
                                   role="tab" aria-controls="custom-content-below-detail" aria-selected="false">
                                    Detail
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
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">

                            <div class="tab-pane fade active show" id="custom-content-below-main" role="tabpanel" aria-labelledby="custom-content-below-main-tab">
                                @include('admin.car.form.main')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-detail" role="tabpanel" aria-labelledby="custom-content-below-detail-tab">
                                @include('admin.car.form.detail')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-media" role="tabpanel" aria-labelledby="custom-content-below-media-tab">
                                @include('admin.car.form.media')
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-location" role="tabpanel" aria-labelledby="custom-content-below-location-tab">
                                @include('admin.car.form.location')
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
                <button type="submit" class="btn btn-success">{{ (isset($car->id)) ? 'Update' : 'Save' }}</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">{{ (isset($car->id)) ? 'Update' : 'Save' }} & edit</a>
                    <a class="dropdown-item" href="#">{{ (isset($car->id)) ? 'Update' : 'Save' }} & new</a>
                </div>
            </div>
        </div>
    </div>
</form>
@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/ekko-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker.css') }}">
@endpush

@push('js')
    <script type="text/javascript" src="{{ asset('admin/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ekko-lightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/moment-with-locales.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/daterangepicker.js') }}"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
          theme: 'bootstrap4'
        })
      })
    </script>
    <script type="text/javascript">
      $(function() {
        let detailCurrentDate = $('input[name="detailCurrentDate"]');
        let detailCurrentDateStart = $('input[name="detailCurrentDateStart"]');
        let detailCurrentDateEnd = $('input[name="detailCurrentDateEnd"]');

        detailCurrentDate.daterangepicker({
          autoUpdateInput: false,
          locale: {
            cancelLabel: 'Clear'
          }
        });

        detailCurrentDate.on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
          detailCurrentDateStart.val(picker.startDate.format('YYYY-MM-DD'));
          detailCurrentDateEnd.val(picker.endDate.format('YYYY-MM-DD'));
        });

        detailCurrentDate.on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
          detailCurrentDateStart.val('');
          detailCurrentDateEnd.val('');
        });

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
      })
    </script>
@endpush
