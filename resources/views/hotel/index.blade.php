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
                            @if(isset($hotels) && $hotels->isNotEmpty())
                                @foreach($hotels as $hotel)
                                <div class="col-md-6 col-sm-6 animate-box">
                                    <div class="hotel-entry">
                                        <a href="{{ route('hotel.show', $hotel) }}" class="hotel-img"
                                           style="background-image: url({{
                                           isset($hotel->image) && isset($hotel->image->name) &&
                                           Storage::disk('public')->exists('hotels/' . $hotel->image->name)
                                           ? asset("storage/hotels/" . $hotel->image->name)
                                           : asset('img/default/hotel.jpg')  }});"
                                        >
                                            <p class="price"><span>${{ number_format($hotel->price_from) }}</span>
                                                @if(isset($hotel->bonuses) && isset(current(current($hotel->bonuses->load('language')))->language->title))
                                                    <small>/{{ current(current($hotel->bonuses->load('language')))->language->title }}</small>
                                                @endif
                                            </p>
                                        </a>
                                        <div class="desc">
                                            <p class="star"><span>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full">
                                                    </i></span> Good Reviews</p>
                                            <h3><a href="{{ route('hotel.show', $hotel) }}">{{ $hotel->language->title }}</a></h3>
                                            <span class="place">{{ $hotel->language->address }}</span>
                                            <p>{{ \Str::limit($hotel->language->description, 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    @if($hotels->lastPage() > 1)
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="pagination">
                                    @if($hotels->currentPage() !== 1)
                                        <li>
                                            <a href="{{ $hotels->url($hotels->currentPage() - 1) }}">&laquo;
                                            </a>
                                        </li>
                                    @endif
                                    @for($i = 1; $i <= $hotels->lastPage(); $i++)
                                        @if($hotels->currentPage() == $i)
                                            <li class="active "><a class="disabled">{{ $i }}</a></li>
                                        @else
                                            <li><a href="{{ $hotels->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                    @endfor
                                    @if($hotels->currentPage() !== $hotels->lastPage())
                                        <li>
                                            <a href="{{ $hotels->url($hotels->currentPage() + 1) }}">&raquo;
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

                        @include('layouts.reservation.sidebar-hotel')

                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Price Range</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="guests">Price from:</label>
                                                    <div class="form-field">
                                                        <i class="icon icon-arrow-down3"></i>
                                                        <select name="people" id="people" class="form-control">
                                                            <option value="#">1</option>
                                                            <option value="#">200</option>
                                                            <option value="#">300</option>
                                                            <option value="#">400</option>
                                                            <option value="#">1000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="guests">Price to:</label>
                                                    <div class="form-field">
                                                        <i class="icon icon-arrow-down3"></i>
                                                        <select name="people" id="people" class="form-control">
                                                            <option value="#">2000</option>
                                                            <option value="#">4000</option>
                                                            <option value="#">6000</option>
                                                            <option value="#">8000</option>
                                                            <option value="#">10000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Review Rating</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                                                class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
                                                </p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Categories</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Apartment</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Hotel</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Hostel</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Inn</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Villa</h4>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Location</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Greece</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Italy</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Spain</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Germany</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Japan</h4>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Facilities</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Airport Transfer</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Resto Bar</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Restaurant</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Swimming Pool</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Japan</h4>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection