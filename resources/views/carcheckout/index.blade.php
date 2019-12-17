@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div id="colorlib-contact">
        <div class="container">
            @if(isset($car))
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 animate-box">
                        <h3>{{ __('carcheckout/index.booking_confirmation') }}</h3>
                        <form action="{{ route('car.checkout.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="car" value="{{ request()->car ? request()->car : '' }}">
                            <input type="hidden" name="start_date" value="{{ request()->start_date ? request()->start_date : '' }}">
                            <input type="hidden" name="start_time" value="{{ request()->start_time ? request()->start_time : '' }}">
                            <input type="hidden" name="end_date" value="{{ request()->end_date ? request()->end_date : '' }}">
                            <input type="hidden" name="end_time" value="{{ request()->end_time ? request()->end_time : '' }}">
                            <input type="hidden" name="adults" value="{{ request()->adults ? request()->adults : '' }}">

                            @if(!auth()->id())
                                @include('auth.register-form')
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wrap-division">
                                        <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                                            <h2>{{ $car->title }}</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 animate-box">
                                                <div class="room-wrap">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="room-img" style="background-image: url({{
                                                               isset($car->img) && current($car->img) &&
                                                               Storage::disk('public')->exists('cars/' . current($car->img))
                                                               ? asset("storage/cars/" . current($car->img))
                                                               : asset('img/default/car.jpg')  }});">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><label>{{ __('carcheckout/index.subtotal') }}:</label></td>
                                            <td>${{ ($car->price) ? request()->adults ? (int)request()->adults * $car->price : 1 : 'Error' }}</td>
                                        </tr>
                                        <tr>
                                            <td><label>{{ __('carcheckout/index.deposit') }}:</label></td>
                                            <td>$0</td>
                                        </tr>
                                        <tr>
                                            <td><label>{{ __('carcheckout/index.amount') }}:</label></td>
                                            <td>$0</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" value="{{ __('carcheckout/index.submit') }}" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <p>{{ __('carcheckout/index.not_available') }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('css')
    <style>
        .star-add {
            margin-left: 5px;
            margin-right: 10px;
            font-size: larger;
        }
    </style>
@endpush
