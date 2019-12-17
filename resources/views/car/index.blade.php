@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div class="colorlib-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="wrap-division">
                            @if(isset($cars) && $cars->isNotEmpty())
                                @foreach($cars as $car)
                                <div class="col-md-6 col-sm-6 animate-box">
                                    <div class="hotel-entry">
                                        <a href="#" class="hotel-img"
                                           style="background-image: url({{
                                           isset($car->img) && current($car->img) &&
                                           Storage::disk('public')->exists('cars/' . current($car->img))
                                           ? asset("storage/cars/" . current($car->img))
                                           : asset('img/default/car.jpg')  }});"
                                        >
                                            <p class="price"><span>${{ number_format($car->price * $car->adult_min) }}</span></p>
                                        </a>
                                        <div class="desc">
                                            <p class="star">
                                                <span>
                                                    <span title="{{ trans_choice('car/index.adult_min', $car->adult_min, ['adult' => $car->adult_min]) }}">
                                                        <i class="fa fa-user"></i><span class="star-add">{{ $car->adult_min }} / {{ $car->adult_max }}</span>
                                                    </span>
                                                    <span title="{{ trans_choice('car/index.bags', $car->bags, ['bags' => $car->bags]) }}">
                                                        <i class="fa fa-suitcase"></i><span class="star-add">{{ $car->bags }}</span>
                                                    </span>
                                                    <span title="{{ trans_choice('car/index.doors', $car->doors, ['doors' => $car->doors]) }}">
                                                        <i class="fa fa-window-close-o"></i><span class="star-add">{{ $car->doors }}</span>
                                                    </span>
                                                    @if($car->condition)
                                                        <span title="{{ __('car/index.condition_title') }}">
                                                            <i class="fa fa-snowflake-o"></i><span class="star-add">{{ __('car/index.condition_text') }}</span>
                                                        </span>
                                                    @endif
                                                </span>
                                            </p>
                                            <p>
                                                <span style="float: right" class="btn btn-primary open-modal-btn" data-id="{{ $car->id }}">{{ __('car/index.open_modal') }}!</span>
                                                <h3>{{ $car->title }}</h3>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="col-md-6 col-sm-6 animate-box">
                                    <p>
                                        {{ __('car/index.no_results') }}
                                    </p>
                                </div>
                            @endif

                        </div>
                    </div>
                    @if($cars->lastPage() > 1)
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="pagination">
                                    @if($cars->currentPage() !== 1)
                                        <li>
                                            <a href="{{ $cars->url($cars->currentPage() - 1) }}">&laquo;
                                            </a>
                                        </li>
                                    @endif
                                    @for($i = 1; $i <= $cars->lastPage(); $i++)
                                        @if($cars->currentPage() == $i)
                                            <li class="active "><a class="disabled">{{ $i }}</a></li>
                                        @else
                                            <li><a href="{{ $cars->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                    @endfor
                                    @if($cars->currentPage() !== $cars->lastPage())
                                        <li>
                                            <a href="{{ $cars->url($cars->currentPage() + 1) }}">&raquo;
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- SIDEBAR-->
                <div class="col-md-3">
                    <div class="sidebar-wrap">
                        @include('layouts.reservation.sidebar-car')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.booking-car')
@endsection


@push('css')
    <style>
        .star-add {
            margin-left: 5px;
            margin-right: 10px;
            font-size: larger;
        }
        .cover {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: 0.6;
            z-index: 100;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            overflow-x: auto;
            overflow-y: scroll;
            padding: 20px;
            z-index: 200;
        }
        .content {
            display: none;
            width: 100%;
            min-width: 200px;
            width: 100%;
            position: relative;
            background-color: #2C2E3E;
            z-index: 300;
            padding: 50px 0;
        }
    </style>
@endpush

@push('js')
    <script type="text/javascript">
      $(function() {
        var car_id;
        var data;
        $('#car_search').submit(function(e){
          data = $(this).serialize();
          // console.log(data);
          e.preventDefault();
          var request = $.ajax({
            type:'GET',
            url:'{{ route('car.search.index') }}',
            data: data,
            dataType: "html"
          });
          request.done(function(msg) {
            console.log(msg);
            let res = JSON.parse(msg);
            if(res.status){
              $("#modal-status").attr('class', 'show');
              $("#modal-error").attr('class', 'hide');
              $("#model-checkout").attr('href', '{{ route('hotel.checkout.index') }}?' + data);
            }
            else if(res.error){
              $("#modal-status").attr('class', 'hide');
              $("#modal-error").attr('class', 'show');
              $("#modal-error").html( res.error );
              $("#model-checkout").attr('href', '#');
            }
          });
          request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
          });
        });
        // open modal
        var wrap = $('#wrapper'),
          btn = $('.open-modal-btn'),
          modal = $('.cover, .modal, .content');
        btn.on('click', function() {
          modal.fadeIn();
          car_id = $(this).attr("data-id");
          $('#car_id').val(car_id);
        });
        // close modal
        $('.modal').click(function() {
          wrap.on('click', function(event) {
            var select = $('.content');
            if ($(event.target).closest(select).length)
              return;
            $("#modal-error").attr('class', 'hide');
            $("#modal-status").attr('class', 'hide');
            car_id = '';
            $('#car_id').val(car_id);
            data = '';
            modal.fadeOut();
            wrap.unbind('click');
          });
        });
      });
    </script>
@endpush
